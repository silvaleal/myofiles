<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\License;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;
use Request;

class PaymentService
{
    protected $stripe;
    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
    }

    public function payment()
    {
        foreach (Cart::get() as $item) {
            $product = Product::find($item->product_id);
            $items[] = [
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ];
            $metadatas[$product->id] = json_encode([
                'product_id' => $product->id,
                'user_id' => Auth::user()->id
            ]);
        }

        $checkout_session = $this->stripe->checkout->sessions->create([
            'line_items' => $items,
            'metadata' => $metadatas,
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
        return redirect()->away($checkout_session->url);
    }

    public function intent()
    {
        // https://docs.stripe.com/webhooks?locale=pt-BR
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch (\UnexpectedValueException $e) {
            http_response_code(400);
            exit();
        }

        switch ($event->type) {
            case 'checkout.session.completed': // https://docs.stripe.com/api/checkout/sessions/retrieve
                $session = $this->stripe->checkout->sessions->retrieve($event->data->object['id'], []);
                $metadata = $session['metadata']->toArray();

                foreach ($metadata as $value) {
                    $value = json_decode($value, true);

                    License::create([
                        'user_id'=>$value['user_id'],
                        'product_id'=>$value['product_id']
                    ]);
                }
                break;

            // default:
            //     $message = "⚠️ Evento desconhecido recebido: " . $event->type;
            //     break;
        }

        http_response_code(200);
    }
}
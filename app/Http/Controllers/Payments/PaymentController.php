<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Services\PaymentService;
use App\Models\Cart;

class PaymentController extends Controller
{
    protected $service;
    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return to_route('home');
    }

    public function success()
    {   
        Cart::where('user_id', \Auth::user()->id)->delete();
        return to_route('home');
    }

    public function cancel()
    {
        return to_route('home');
    }

    public function payment()
    {
        return $this->service->payment();
    }

    public function intent()
    {
        return $this->service->intent();
    }


}

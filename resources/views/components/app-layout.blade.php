<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>

    <!-- Bibliotecas front-end -->
    @vite(['resources/css/app.css'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <!-- Para o sistema de pagamento -->
    <script src="https://js.stripe.com/v3/"></script>


</head>
<body class="bg-gray-900 text-white">
    {{ $slot }}
</body>
</html>
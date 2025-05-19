<!DOCTYPE html>
<html>
<head>
    <title>Order Status Updated</title>
</head>
<body>
    <h1>Hello, {{ $order->Descrition }}!</h1>
    <p>The status of your production order (ID: {{ $order->id }}) has been updated to <strong>{{ $order->status }}</strong>.</p>
    <p>To update the status of your production order, please <a href="{{ url('/orders/' . $order->id . '/' . $order->token) }}">click here</a>.</p>
    <p>Thank you for using our services.</p>
</body>
</html>

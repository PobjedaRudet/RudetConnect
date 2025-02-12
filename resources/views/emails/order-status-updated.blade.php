<!DOCTYPE html>
<html>
<head>
    <title>Order Status Updated</title>
</head>
<body>
    <h1>Hello, {{ $order->customer_name }}!</h1>
    <p>The status of your production order (ID: {{ $order->id }}) has been updated to <strong>{{ $order->status }}</strong>.</p>
    <p>Thank you for using our services.</p>
</body>
</html>

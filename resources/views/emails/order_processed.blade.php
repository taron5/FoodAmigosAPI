<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Processed</title>
</head>
<body>
<h1>Order Processed</h1>
<p>Dear Admin,</p>
<p>The following order has been processed:</p>
<p>Order ID: {{ $order->id }}</p>
<p>Total Amount: ${{ $order->total_amount }}</p>
</body>
</html>

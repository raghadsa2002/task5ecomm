<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>
<body>
    <h1>Order List</h1>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>

    
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
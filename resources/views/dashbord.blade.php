<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Welcome, Admin</h1>
    <nav>
        <a href="{{ route('products.index') }}">Manage Products</a>
        <a href="{{ route('categories.index') }}">Manage Categories</a>
        <a href="{{ route('orders.index') }}">View Orders</a>
    </nav>
</body>
</html>

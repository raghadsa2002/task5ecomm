<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Categories</title>
</head>
<body>
    <h1>Category Management</h1>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>

    <h2>Add New Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Category Name" required>
        <button type="submit">Add Category</button>
    </form>

    <h2>Category List</h2>
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>


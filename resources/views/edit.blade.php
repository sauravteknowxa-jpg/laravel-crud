<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h2>Edit Product</h2>

<form action="{{ route('update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $product->email }}"><br><br>

    <label>Address:</label><br>
    <textarea name="address">{{ $product->address }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('index') }}">Back</a>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h2>Add Product</h2>

<form action="{{ route('store') }}" method="POST">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" value=""><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Address:</label><br>
    <textarea name="address"></textarea><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="{{ route('index') }}">Back</a>

</body>
</html>

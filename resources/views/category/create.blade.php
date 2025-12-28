<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h2>Add Product</h2>

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    
    <input type="text" name="name" ><br>   
    <input type="text" name="model"><br>
    <input type="text" name="price"><br>
    <input type="file" name="image"><br>
    <input type="text" name="description"><br>

    <button type="submit">Save</button>
</form>




</body>
</html>

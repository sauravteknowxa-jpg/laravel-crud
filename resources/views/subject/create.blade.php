<!DOCTYPE html>
<html>
<head>    
    <title>Document</title>
</head>
<body>
    <h2>Add Product</h2>

    <form action="{{ route('subject.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name"><br>
        <input type="file" name="image"><br>
        <input type="text" name="result"><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
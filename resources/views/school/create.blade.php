<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h2>Add Product</h2>

<form action="{{ route('school.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <input type="text" name="classroom" ><br>   
    <input type="text" name="student"><br>
    <input type="text" name="teachers"><br>
    <input type="file" name="image"><br>
    

    <button type="submit">Save</button>
</form>




</body>
</html>

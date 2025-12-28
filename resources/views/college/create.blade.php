<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <form action="{{ route('college.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name"><br>
        <input type="text" name="department"><br>
        <input type="file" name="image"><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
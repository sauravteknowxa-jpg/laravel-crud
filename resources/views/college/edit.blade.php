<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <h2>Edit</h2>
    <form action="{{ route('college.update') }}" method="post" enctype="multipart/form-data">
       @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $college->name }}" ><br>
        <input type="text" name="department" value="{{ $college->department }}" ><br>
        <input type="file" name="image"><br>
       @if ($college->image)
       <br>
       <img src="{{ asset('public/gallery/'.$college->image) }}" width="80">
       <br>
       @endif
       <button type="submit">Update</button>
    </form>
</body>
</html>
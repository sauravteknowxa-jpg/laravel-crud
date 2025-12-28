<!DOCTYPE html>
<html >
<head>
    
    <title>Edit</title>
</head>
<body>
    <h2>Edit banner</h2>
    <form action="{{route('banner.update',$banner->id)  }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $banner->name }}"><br>
        <input type="file" name="image"><br>
        @if ($banner->image)
        <br>
        <img src="{{ asset('public/photo/'.$banner->image) }}" width="80">
        @endif
        <br>
        <input type="text" name="result" value="{{ $banner->result }}"><br>
        <button>Update</button>
    </form>
</body>
</html>
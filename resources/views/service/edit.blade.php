<!DOCTYPE html>
<html >
<head>   
    <title>Edit</title>
</head>
<body>
    <h2>Edit Service</h2>
    <form action="{{ route('service.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $service->name }}"><br>
        <input type="file" name="image"><br>
        @if ($service->image)
        <br>
        <img src="{{ asset('public/file/'.$service->image) }}" width="80">
        @endif
        <input type="text" name="detail" value="{{ $service->detail }}"><br>
        <input type="text" name="description" value="{{ $service->description }}"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
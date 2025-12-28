<!DOCTYPE html>
<html >
<head>
    <title>Document</title>
</head>
<body>
    <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="name"><br>
      <input type="file" name="image"><br>
      <input type="text" name="detail"><br>
      <input type="text" name="description"><br>

      <button type="submit">Save</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html >
<head>
    
    <title>Edit</title>
</head>
<body>
    <h2>Edit Subject</h2>
    <form action="{{route('subject.update',$subject->id)  }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $subject->name }}"><br>
        <input type="file" name="image"><br>
        @if ($subject->image)
        <br>
        <img src="{{ asset('public/album/'.$subject->image) }}" width="80">
        @endif
        <br>
        <input type="text" name="result" value="{{ $subject->result }}"><br>
        <button>Update</button>
    </form>
</body>
</html>
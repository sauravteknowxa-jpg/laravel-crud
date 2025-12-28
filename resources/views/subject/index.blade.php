<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <h2>Subject</h2>
    <a href="{{ route('subject.create') }}">Add new subject</a>
    <table border="2">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Result</th>
                <th>Action</th>
            </tr>
        </thead>
        <br>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subject->name}}</td>
                    <td>
                        @if($subject->image)
                         <img src="{{ asset('public/album/'.$subject->image)}}" width="80">
                        @endif
                    </td>
                    <td>{{ $subject->result }}</td>
                    <td>
                        <a href="{{ route('subject.edit',$subject->id) }}">Edit</a>
                        <form action="{{ route('subject.delete',$subject->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
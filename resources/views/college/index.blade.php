<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <h2>College Data</h2>
    <a href="{{ route('college.create') }}">Add new data</a>
    <table border="2">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Department</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
        </thead>
        <br>
        <tbody>
            @foreach ($colleges as $college)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $college->name }}</td>
                <td>{{ $college->department}}</td>
                <td>
                    @if ($college->image)
                        <img src="{{ asset('public/gallery/'.$college->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('college.edit',$college->id) }}">Edit</a>
                    <form action="{{ route('college.delete',$college->id) }}" method="post">
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
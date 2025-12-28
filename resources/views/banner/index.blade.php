<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <h2>Banner</h2>
    <a href="{{ route('banner.create') }}">Add new banner</a>
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
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $banner->name}}</td>
                    <td>
                        @if($banner->image)
                         <img src="{{ asset('public/photo/'.$banner->image)}}" width="80">
                        @endif
                    </td>
                    <td>{{ $banner->result }}</td>
                    <td>
                        <a href="{{ route('banner.edit',$banner->id) }}">Edit</a>
                        <form action="{{ route('banner.delete',$banner->id) }}" method="post">
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
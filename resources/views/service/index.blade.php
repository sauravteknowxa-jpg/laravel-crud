<!DOCTYPE html>
<html >
<head>
   
    <title>Document</title>
</head>
<body>
    <h2>Service</h2>
    <a href="{{route('service.create')  }}">Add new service</a>
    <table border="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Detail</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <br>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->name }}</td>
                        <td>
                            @if($service->image)
                                <img src="{{ asset('public/file/'.$service->image) }}" width="80">
                            @endif
                        </td>
                        <td>{{ $service->detail }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <a href="{{ route('service.edit',$service->id) }}">Edit</a>
                            <form action="{{ route('service.delete',$service->id) }}" method="post">
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
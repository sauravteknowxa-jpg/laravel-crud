<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="{{ route('profilestore') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
        <input type="file" name="image">
    <button>submit</button>
</form>
<table border="2">
        <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>action</th>
    </tr>
</thead>
<br>
<tbody>
    @foreach ($profiles as $profile)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $profile-> name }}</td>
            <!-- <td>{{ $profile-> image }}</td> -->
            <td>
                    @if($profile->image)
                        <img src="{{ asset('public/profiles/'.$profile->image) }}" width="80">
                    @endif
             </td>
            
            <td>
                <a href="{{ route ('editprofile', $profile->id ) }} ">edit</a>
                <form action="{{ route('deleteprofile' , $profile->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


</table>
</body>
</html>
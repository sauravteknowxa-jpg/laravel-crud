<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="{{ route('iteamstore') }}">
    @csrf
    <input type="text" name="name">
        <input type="email" name="email">
    <button>submit</button>
</form>

<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>action</th>
    </tr>
</thead>

<tbody>
    @foreach ($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ route ('edititems', $item->id ) }} ">edit</a>
                <form action="{{ route('itemsdelete' , $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

</body>
</html>
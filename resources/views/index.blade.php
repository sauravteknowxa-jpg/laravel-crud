
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>

<h2>Product List</h2>

<a href="{{ route('create') }}">Add New Product</a>

<table border ="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>

    @foreach($product as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->address }}</td>
        <td>
            <a href="{{ route('edit', $item->id) }}">Edit</a>

            <form action="{{ route('delete', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>

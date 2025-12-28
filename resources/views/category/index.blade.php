
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>

<h2>Category</h2>

<a href="{{ route('category.create') }}">Add New Product</a>

<table border="2">
        <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Model</th>
        <th>Price</th>
        <th>Image</th>
        <th>Description</th>
        <th>action</th>
    </tr>
</thead>
<br>
<tbody>
    @foreach ($category as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item-> name }}</td>
            <td>{{ $item-> model }}</td>
            <td>{{ $item-> price }}</td>
            <td>
                    @if($item->image)
                        <img src="{{ asset('public/uploads/'.$item->image) }}" width="80">
                    @endif
             </td>
            <td>{{ $item-> description }}</td>
            <td>
                <a href="{{ route('category.edit',$item->id) }}">Edit</a>
                <form action="{{ route('category.delete',$item->id) }}" method="POST">
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

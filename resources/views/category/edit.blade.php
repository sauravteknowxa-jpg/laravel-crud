<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h2>Edit Category</h2>

    <form method="POST" action="{{ route('category.update' ,$category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="name" value="{{ $category->name }}"><br>
                <input type="text" name="model" value="{{ $category->model }}"><br>
                <input type="text" name="price" value="{{ $category->price }}"><br>
                <input type="file" name="image"><br>
                @if($category->image)
                    <br>
                    <img src="{{ asset('public/uploads/'.$category->image) }}" width="80">
                @endif
                <br>
                <input type="text" name="description" value="{{ $category->description }}"><br>
                <button>update</button>
    </form>
</body>
</html>


<form method="POST" action="{{ route('updateprofile' ,$profile->id) }}" enctype="multipart/form-data">
    @csrf
     @method('PUT')
    <input type="text" name="name" value="{{ $profile->name }}">
    <input type="file" name="image">
    @if($profile->image)
        <br>
        <img src="{{ asset('public/profiles/'.$profile->image) }}" width="80">
    @endif

    <button>update</button>
</form>
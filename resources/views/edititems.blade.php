<form method="POST" action="{{ route('editupdate' ,$item->id) }}">
    @csrf
     @method('PUT')
    <input type="text" name="name" value="{{ $item->name }}">
        <input type="email" name="email" value="{{ $item->email }}">
    <button>submit</button>
</form>
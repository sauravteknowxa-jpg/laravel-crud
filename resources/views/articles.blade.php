<form method="POST"  action="{{ route('articledata') }}">
    @csrf
    <input type="text" name="name">
    <input type="text" name="model">
    <input type="text" name="price">
    <input type="text" name="description">
    <button>submit</button>
</form>
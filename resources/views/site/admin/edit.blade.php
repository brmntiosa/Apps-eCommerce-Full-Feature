<h1>Edit User</h1>
<form action="{{ route('site.admin.updateUser', $user->id) }}" method="post">
    @csrf
    @method('put')
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <button type="submit">Update</button>
</form>

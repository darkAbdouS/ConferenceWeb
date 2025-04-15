<!DOCTYPE html>
<html>
<head>
    <title>Conference Registration</title>
</head>
<body>
    <h1>Register for the Conference</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        @error('name') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>
        @error('email') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Phone (optional):</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}"><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>

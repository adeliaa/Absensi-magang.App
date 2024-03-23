<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>

<body>
    <h1>Edit Profile</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('profile.update', $profile->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama', $profile->nama) }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $profile->email) }}">
        </div>
        <div>
            <label for="universitas">Universitas:</label>
            <input type="text" name="universitas" value="{{ old('universitas', $profile->universitas) }}">
        </div>
        <div>
            <label for="unit">Unit:</label>
            <input type="text" name="unit" value="{{ old('unit', $profile->unit) }}">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>
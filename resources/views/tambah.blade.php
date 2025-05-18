<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data</title>
</head>
<body>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

  <form action="{{ route('post.tambah') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama">
    @error('nama')
        <p>{{ $message }}</p>
    @enderror
    <br><br>
    
    <input type="text" name="email" placeholder="Email">
    @error('email')
        <p>{{ $message }}</p>
    @enderror
    <br><br>

    <input type="password" name="password" placeholder="Password">
    @error('password')
        <p>{{ $message }}</p>
    @enderror
    <br><br>
    
    <input type="submit" value="Simpan">
  </form>

</body>
</html>
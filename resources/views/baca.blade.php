<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Data Pengguna</title>
    <style>
      body {
        background: linear-gradient(to right, #B6B09F, #EAE4D5);
        font-family: "Lexend", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
        min-height: 100vh;
      }
      .table-container {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
      }
      .table thead th {
        background-color: #6c757d;
        color: white;
      }
      .action-link {
        text-decoration: none;
        transition: all 0.3s ease;
      }
      .action-link:hover {
        transform: translateY(-2px);
      }
    </style>
  </head>
  <body class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="table-container">
            <h1 class="text-center mb-4">Data Pengguna</h1>
            
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-dark">
                  <tr>
                    <th scope="col" width="5%">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data_users as $users)
                  <tr>
                    <th scope="row">{{ $users->id }}</th>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                      <a href="{{ route('get.ubah', $users->id) }}" class="btn btn-sm btn-warning action-link">
                        <i class="bi bi-pencil-square"></i> Ubah
                      </a>

                      <form action="{{ route('get.hapus', $users->id) }}" method="post" class="d-inline mb-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger action-link" onclick="return confirm('Yakin ingin menghapus data ini?')">
                          <i class="bi bi-trash"></i> Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
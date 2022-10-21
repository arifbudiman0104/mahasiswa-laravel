</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel CRUD Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel CRUD Mahasiswa</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Create Mahasiswa</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Alamat</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>
                        <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$data->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $mahasiswa->links() !!}
    </div>
</body>

</html>

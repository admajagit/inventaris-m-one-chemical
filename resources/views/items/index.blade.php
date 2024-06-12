<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Items</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Data Items</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('items.create') }}" class="btn btn-warning">Tambah Item</a>
                        <a href="{{ route('categories.index') }}" class="btn btn-warning">Tambah category</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE') <!-- Ubah metode form menjadi DELETE -->
                            <button class="btn btn-primary" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>price</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/item/' . $item->image_url) }}" alt="Image" style="width: 100px; height: auto;">
                                    </td>                                    
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Yakin?')" action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

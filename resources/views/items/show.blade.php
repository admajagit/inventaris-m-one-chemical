<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .card-img-top {
            max-height: 500px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <img src="{{ asset('/storage/item/'.$item->image_url) }}" class="card-img-top" alt="Image of {{ $item->name }}">
            <div class="card-body">
                <h3 class="card-title text-center">{{ $item->name }}</h3>
                <p class="card-text">
                    <strong>Description:</strong> {!! $item->description !!}
                </p>
                <p class="card-text">
                    <strong>Quantity:</strong> {{ $item->quantity }}
                </p>
                <p class="card-text">
                    <strong>Price:</strong> ${{ $item->price }}
                </p>
                <p class="card-text">
                    <strong>Category:</strong> {{ $item->category_name }}
                </p>
                <div class="text-center">
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

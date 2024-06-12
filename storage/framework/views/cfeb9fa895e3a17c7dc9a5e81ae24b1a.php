<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
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
            <img src="<?php echo e(asset('/storage/item/'.$item->image_url)); ?>" class="card-img-top" alt="Image of <?php echo e($item->name); ?>">
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo e($item->name); ?></h3>
                <p class="card-text">
                    <strong>Description:</strong> <?php echo $item->description; ?>

                </p>
                <p class="card-text">
                    <strong>Quantity:</strong> <?php echo e($item->quantity); ?>

                </p>
                <p class="card-text">
                    <strong>Price:</strong> $<?php echo e($item->price); ?>

                </p>
                <p class="card-text">
                    <strong>Category:</strong> <?php echo e($item->category_name); ?>

                </p>
                <div class="text-center">
                    <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-primary">Edit</a>
                    <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH C:\Users\ADMIN\Documents\admj\resources\views/items/show.blade.php ENDPATH**/ ?>
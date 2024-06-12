<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Items</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
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
                        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-warning">Tambah Item</a>
                        <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-warning">Tambah category</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?> <!-- Ubah metode form menjadi DELETE -->
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
                            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-center">
                                        <img src="<?php echo e(asset('storage/item/' . $item->image_url)); ?>" alt="Image" style="width: 100px; height: auto;">
                                    </td>                                    
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->description); ?></td>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td><?php echo e($item->price); ?></td>
                                    <td><?php echo e($item->category_name); ?></td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Yakin?')" action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST">
                                            <a href="<?php echo e(route('items.show', $item->id)); ?>" class="btn btn-primary">Detail</a>
                                            <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-success">Edit</a>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\Users\ADMIN\Documents\admj\resources\views/items/index.blade.php ENDPATH**/ ?>
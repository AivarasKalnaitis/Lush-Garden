

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Products
                        <a class="btn btn-sm btn-outline-primary float-right" href="<?php echo e(route('products.create')); ?>">+</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>

                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($item->getFirstImageUrl())); ?>" width="70">
                                    </td>
                                    <td><?php echo e($item->title); ?></td>
                                    <td><?php echo e($item->slug); ?></td>
                                    <td><?php echo e($item->price); ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('products.edit', ['product' => $item->id])); ?>">Edit</a>
                                        <form action="<?php echo e(route('products.destroy', ['product' => $item->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <input type="submit" onclick="return confirm('Do you really want to delete a record?');"
                                                   class="btn btn-sm btn-outline-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>

                    <div class="card-footer">
                        <?php echo e($list->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Interaktyvios interneto technologijos\backend\resources\views/products/list.blade.php ENDPATH**/ ?>
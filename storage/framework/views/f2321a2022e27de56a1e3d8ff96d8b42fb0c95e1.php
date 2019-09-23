<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                   <h1>Welcome <strong><?php echo e(auth()->user()->name); ?></strong></h1>

                   Member Since: <?php echo e(auth()->user()->created_at->format('m/d/Y')); ?>


                   <hr />
                   <h3>Actions</h3>

                   <nav class="navbar navbar-light bg-light">
                        <a class="btn btn-outline-danger" href="forum/create">Create Forum (temporary)</a>
                        <a class="btn btn-outline-secondary" href="#">Create Topic</a>
                        <a class="btn btn-outline-info" href="#">Upload To Gallery</a>
                        <a class="btn btn-outline-success" href="message">Send a Message</a>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/account.blade.php ENDPATH**/ ?>
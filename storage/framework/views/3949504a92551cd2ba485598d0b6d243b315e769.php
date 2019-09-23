<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum</div>
					<h3>Add a Forum</h3>
					<form method="POST" action="store">
					<?php echo csrf_field(); ?>
						<div>
							<div>
								<label>Title</label>
								<input type="text name="title">
							</div>

							<button>Submit</button>
						</div>
					</form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/createForum.blade.php ENDPATH**/ ?>
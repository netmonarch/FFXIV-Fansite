<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="jumbotron">
      
      <p class="lead"><h3>Gallery</h3></p>
      <hr class="my-4">
      <p>
		<div style="width:50%;" id="carouselExampleControls" class="container carousel slide text-center bg-dark" data-ride="carousel">
		  <div class="carousel-inner">
		  	<div class="carousel-item active">
			  <img src="../storage/app/<?php echo e($files[0]); ?>" height="300px;"alt="...">
			</div>
			
			<?php array_shift ($files); ?>
		  <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="carousel-item">
			  <img src="../storage/app/<?php echo e($f); ?>" height="300px" alt="...">
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		
		<?php if(auth()->id() !== NULL): ?>
		<br />
		<form action="gallery/store" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
			<div class="custom-file">
			  <input type="file" class="custom-file-input" id="customFile" name="picture" onchange="document.getElementById('fileLabel').innerHTML=this.value.slice(12)" required/>
			  <label class="custom-file-label" for="customFile" id="fileLabel"></label>
			</div>
			<br />
			<br />
			<p align="center">
				<button class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
			</p>
		</form>
	  <?php endif; ?>
	  </p>
      

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/gallery.blade.php ENDPATH**/ ?>
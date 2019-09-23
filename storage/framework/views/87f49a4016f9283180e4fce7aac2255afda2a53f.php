<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'FFXIV Fansite')); ?></title>
	<script src="https://kit.fontawesome.com/5c36625618.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <!-- Scripts -->


    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body
            {
            background:linear-gradient(
          rgba(0, 0, 0, 0.7), 
          rgba(0, 0, 0, 0.7)
        ), url('http://localhost/FFXIV-Fansite/resources/images/1.jpg');
            background-size:100%;
            }
			
		.oddrow td
		{
			background-color:#D8D8D8;
			height:50px;
			padding:7px;
		}
		
		.oddrow td:hover
		{
			background-color:#E8E8E8;
		}
		
		.evenrow td
		{
			background-color:white;
			height:50px;
			padding:7px;
		}
		
		.evenrow td:hover
		{
			background-color:#E8E8E8;
		}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      <a class="navbar-brand" href="#"><img height="60px" src="http://localhost/FFXIV-Fansite/resources/images/2.png" /> Final Fantasy XIV</a> <big><strong>|</strong></big  >
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(env('APP_URL')); ?>/">Home <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(env('APP_URL')); ?>/forum">Forum</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(env('APP_URL')); ?>/gallery">Gallery</a>
                          </li>
                        </ul>
                      </div>
                    </nav>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(env('APP_URL')); ?>/account">
                                        My Account
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
		
		<nav class="navbar fixed-bottom navbar-light bg-light">
		<?php if(! auth()->id() == NULL ): ?>
		<span class="text-dark">
		<strong>Counts</strong>
		
		[Member Accounts: <strong><?php echo e($stats[3]); ?></strong>]
		[Forums: <strong><?php echo e($stats[0]); ?></strong>]
		[Topics: <strong><?php echo e($stats[1]); ?></strong>]
		[Comments: <strong><?php echo e($stats[2]); ?></strong>]
		<?php endif; ?>
	</span>
		</nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/layouts/app.blade.php ENDPATH**/ ?>
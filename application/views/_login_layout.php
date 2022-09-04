<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PJL Prestamos - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo site_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo site_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<link href="<?php echo site_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div><!-- login image -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>

									<!-- msgs -->
									<?php if ( $this->session->flashdata( 'msg' ) ) : ?>
										<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
											<?= $this->session->flashdata( 'msg' ); ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>		
									<?php endif; ?>							
									<!-- / msgs -->

									<!-- errors --> 
									<?php if ( validation_errors() ) { ?> 
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?php echo validation_errors(); ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php } ?>

                                    <form class="user" action="<?php echo site_url( 'user/login' ); ?>" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="inputPassword" placeholder="Ingrese su contraseña">
                                        </div>
          
										<button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Crear Cuenta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo site_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo site_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

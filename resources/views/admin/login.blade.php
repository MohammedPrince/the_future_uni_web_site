

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo-basic.adminkit.io/pages-sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 11:29:39 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="admin/img/logos/logo.png" />

	

	<title>Login | Fu Site Management</title>

	<link href="admin/css/app.css" rel="stylesheet">
	<link href="admin/css/alerts.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">The Future University Site Management</h1>
							<div class="rounded text-center"> 
							<img src="/admin/img/logos/logo.png" alt="logo" height="120px" width="120px" />
							</div>
						</div>

						
						<div class="card">

							@if (session()->has('success'))
						<div class="alert success text-center">
							
							<p class="inner">
								{{session()->get('success')}}
							</p>
						</div>
						@endif

						@if (session()->has('failure'))
						<div class="alert error text-center">
							
							<p class="inner">
								{{session()->get('failure')}}
							</p>
						</div>
						
						@endif
							<div class="card-body">
								<div class="m-sm-3">
									<form  action="/login" method="POST">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="loginusername" placeholder="Enter your username" required="required" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="loginpassword" placeholder="Enter your password" required="required"/>
										</div>
										<div>
											<div class="form-check align-items-center">
												
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
                                           
											<button class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="admin/js/app.js"></script>

</body>
</html>



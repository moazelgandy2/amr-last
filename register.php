<?php
	// session_start();
	// if (isset($_SESSION['SESSION_EMAIL'])) {
	// 	die();
	// }

    include 'connect.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // $group = mysqli_real_escape_string($conn, $_POST['groupp']);
        // $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        // $father_number = mysqli_real_escape_string($conn, $_POST['father_number']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
        // $code = mysqli_real_escape_string($conn, md5(rand()));
        // $tim = date("H:i", strtotime("+0 HOURS"));
        // $date = date("Y-m-d", strtotime("+0 HOURS"));
        // $act = 'no';

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {

                $sql = "INSERT INTO users (name,email, exam,password,type,status) VALUES ('{$name}','{$email}','{$email}@exam.mramr','{$password}','Student','not')";   
                // $queryy = mysqli_query($conn, "SELECT * FROM timee WHERE time_id");

                // $sqll = "INSERT INTO timee ( student_name,email,time , date) VALUES ('{$name}','{$email}', '{$tim}', '{$date}')";
                // $result = mysqli_query($conn, $sqll);

                $result = mysqli_query($conn, $sql);
                header("Location: /login.php");
        }else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
              }
    }
}
?>


<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>MR.Amr Omar</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="imgs/Amr-logos_black.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="imgs/Amr-logos_black.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="imgs/Amr-logos_black.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/jquery-steps/jquery.steps.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>

	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.php">
						<img src="imgs/Amr-logos_black.png" width="100px" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="login.php">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="vendors/images/register-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="register-box bg-white box-shadow border-radius-10">
							<div class="wizard-content">
								<?php echo $msg; ?>

								<form class="tab-wizard2 wizard-circle wizard" action="" method="post">
									<h5>Basic Account Credentials</h5>
									<section>
										<div class="form-wrap max-width-600 mx-auto">
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Name*</label>
												<div class="col-sm-8">
													<input type="text" name="name" class="form-control"  required/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Phone Number*</label
												>
												<div class="col-sm-8">
													<input type="tel" name="email" class="form-control" required/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Password*</label>
												<div class="col-sm-8">
													<input type="password" name="password" class="form-control" required/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Confirm Password*</label
												>
												<div class="col-sm-8">
													<input type="password" name="confirm-password" class="form-control" required/>
												</div>
											</div>
										</div>
									</section>
									<button name="submit" class="btn" type="submit" style="background: #009efb;color: #fff;display: block;padding: 7px 12px;border-radius: 4px;border: 1px solid transparent;min-width: 100px;text-align: center;">Submit</button>


								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- success Popup html Start -->
		<button
			type="button"
			id="success-modal-btn"
			hidden
			data-toggle="modal"
			data-target="#success-modal"
			data-backdrop="static"
		>
			Launch modal
		</button>
		<div
			class="modal fade"
			id="success-modal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div
				class="modal-dialog modal-dialog-centered max-width-400"
				role="document"
			>
				<div class="modal-content">
					<div class="modal-body text-center font-18">
						<h3 class="mb-20">Form Submitted!</h3>
						<div class="mb-30 text-center">
							<img src="vendors/images/success.png" />
						</div>
						Your Account Has Been Successfully Created
					</div>
					<div class="modal-footer justify-content-center">
						<a href="login.php" class="btn btn-primary">Done</a>
					</div>
				</div>
			</div>
		</div>
		<!-- success Popup html End -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
		<script src="vendors/scripts/steps-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>

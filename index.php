<?php
	session_start();
	$_SESSION;

	if (!isset($_SESSION['SESSION_EMAIL'])) {
		header("Location:login.php");
		die();
	}
	include 'connect.php';
	$tim = date("H:i", strtotime("+0 HOURS"));
	$date = date("Y-m-d", strtotime("+0 HOURS"));
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $queryy = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $ti = mysqli_query($conn , "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $admin = mysqli_query($conn , "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $ad = mysqli_fetch_assoc($admin);

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
		<link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/all.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>

		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
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
	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="imgs/Amr-logos_black.png" width="512px" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="imgs/avatar.png" alt="" />
							</span>
							<span class="user-name"><?php
                                if (mysqli_num_rows($query) > 0) {
                                            $row = mysqli_fetch_assoc($query);
                                            echo $row['name'] ;
                                            // " <a href='../signup/logout.php'>Logout</a>"
                                        }

                            ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.php"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="video-player.php"
								><i class="fa-solid fa-play"></i> Videos</a
							>
							<a id="up2"  class="dropdown-item" href="uploadvids/upload.php"
								><i class="fa-solid fa-upload"></i> Upload Video</a
							>
							<a class="dropdown-item" href="help.php"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="logout.php"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<div class="left-side-bar">
			
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						

						<li>
							<a href="index.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-house"></i>
								<span class="mtext">Home</span>
							</a>
						</li>
						<li>
							<a href="profile.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-user"></i>
								<span class="mtext">Profile</span>
							</a>
						</li>
						<li>
							<a href="active.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-bag-shopping"></i>
								<span class="mtext">Activation</span>
							</a>
						</li>
						<li id="ex1">
							<a href="exam.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
                                <i class="fa-solid fa-pen"></i>
                                <span class="mtext">Exams</span>
							</a>
						</li>
						<li id="ex2">
							<a href="#" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-lock"></i>
                                <i class="fa-solid fa-pen"></i>
                                <span class="mtext">Exams</span>
							</a>
						</li>

						<li id="ad">
							<a href="video-player.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-diagram-3"></span
								> -->
								<i class="fa-solid fa-play"></i>
								<span class="mtext">Videos</span>
							</a>
						</li>
						<li id="ad1">
							<a href="#" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-diagram-3"></span
								> -->
								<i class="fa-solid fa-lock"></i>
								<i class="fa-solid fa-play"></i>
								<span class="mtext">Videos</span>
							</a>
						</li>
						
						<li id="up">
							<a href="uploadvids/upload.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-diagram-3"></span
								> -->
								<i class="fa-solid fa-upload"></i>
								<span class="mtext">Upload Videos</span>
							</a>
						</li>
						<li>
							<a href="help.php" class="dropdown-toggle no-arrow">
								<i class="fa-solid fa-gears"></i>
								<span class="mtext">Help</span>
							</a>
						</li>
							<div class="dropdown-divider"></div>
						</li>

					</ul>
				</div>
			</div>
		</div>


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20">
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<div class="col-md-4">
							<img src="vendors/images/banner-img.png" alt="" />
						</div>
						<div class="col-md-8">
							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								Welcome,
								<div class="weight-600 font-30 text-blue"><?php
                                if (mysqli_num_rows($queryy) > 0) {
                                            $roww = mysqli_fetch_assoc($queryy);
                                            $t = mysqli_fetch_assoc($ti);
                                            echo " " . $roww['name'] ;
                                            // " <a href='../signup/logout.php'>Logout</a>"
                                        }

                            ?></div>
							</h4>
							<p class="font-18 max-width-600">
								<span>Account:
									<div style="position: relative;top: -43px;right: -90px;">
										<?php
                                            if ($ad['type'] == "Admin") {
												$clor2="green";
												$ms='Admin' ;
												echo '<div style="font-weight:bold; Color:'.$clor2.'">'.$ms.'</div>';
                                            }
                                            else{
                                                $Color = "gray";
                                                $ms2= "Student";
                                                echo '<div style="font-weight:bold; Color:'.$Color.'">'.$ms2.'</div>';
												echo "<script>
                                                const element5 = document.getElementById('up');
                                                const element6 = document.getElementById('up2');
                                                element5.remove();
                                                element6.remove();
                                                </script>"; 
                                               
                                            }
                                        ?>
									</div> 
								</span>
									
								<span>Status: 
									<div style="position: relative;top: -25px;right: -90px;">
										<?php

											if ($t['status'] =="Yes") {
												$Color2	 ="green";
												$ms='Active' ;
												echo '<div style="font-weight:bold; Color:'.$Color2.'">'.$ms.'</div>';
												echo "<script>
												const element = document.getElementById('ad1');
												const element2 = document.getElementById('ex2');
											
												element.remove();
												element2.remove();
												
												</script>";                
											}
											else{
												$Color = "red";
												$ms2= "Inactive";
												echo '<div style="font-weight:bold;Color:'.$Color.'">'.$ms2.'</div>';
											
												echo "<script>
												const element = document.getElementById('ad');
												const element2 = document.getElementById('ex1');
												element.remove();
												element2.remove();
												</script>";
											}


										?>
									</div> 
								</span><br>
								<span>Registered At: 
									<div style="position: relative;top: -24px;right: -121px; font-weight:bold;">
										<?php echo $t['time']; ?>
									</div>
								</span>
							</p>
						</div>
					</div>
				</div>

				<!-- <div class="row">
					<div class="col-xl-8 mb-30">
						<div class="card-box height-100-p pd-20">
							
						</div>
					</div>
				</div> -->
				<!-- <div class="pd-20 mb-20 card-box">
					<iframe src="https://presenter.jivrus.com/p/1f9eeX8Z7qZU8hnEMfv44ekEBZ0I4_QV4myNk92H-VCg" frameborder="0" marginheight="0" marginwidth="0" style="width: 100%;height: 600px;">Loading…</iframe>

				</div> -->
				<div class="footer-wrap pd-20 mb-20 card-box" style="position: relative;">
					Mainly Developed By
					
						<span style="color: blue;">Moaz Hazem</span><br>
					With 
						<span style="color: blue;">Mohamed Rashad</span>
					Contribution
				</div>
			</div>
		</div>
		<!-- welcome modal start -->

		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="vendors/scripts/dashboard.js"></script>
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

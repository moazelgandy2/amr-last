<?php
    include 'connect.php';

    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../signup/index.php");
        die();
    }
	
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    // if (mysqli_num_rows($query) > 0) {
    //     $row = mysqli_fetch_assoc($query);
    //     echo "Welcome " . $row['name'] . " <a href='../signup/logout.php'>Logout</a>";
    // }
    $queryy = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    // $code = mysqli_query($conn, "SELECT * FROM users WHERE code='{$_SESSION['SESSION_EMAIL']}'");   
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
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/all.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
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
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/plyr/dist/plyr.css"
		/>
	</head>
	<body>
		<!-- <div class="pre-loader">
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
		</div> -->

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
				<div class="user-notification">
					<div class="dropdown">

							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>

						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
									<li>
										<a href="#">
											<img src="vendors/images/img.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="imgs/avatar.png" alt="" />
											<h3>Lea R. Frith</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="vendors/images/photo2.jpg" alt="" />
											<h3>Erik L. Richards</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="vendors/images/photo3.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="vendors/images/photo4.jpg" alt="" />
											<h3>Renee I. Hansen</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="vendors/images/img.jpg" alt="" />
											<h3>Vicki M. Coleman</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
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
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
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

						<li>
							<a href="exam.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
                                <i class="fa-solid fa-pen"></i>
                                <span class="mtext">Exams</span>
							</a>
						</li>
						<li>
							<a href="video-player.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-diagram-3"></span
								> -->
								<i class="fa-solid fa-play"></i>
								<span class="mtext">Videos</span>
							</a>
							
						</li>
						<!--<li id="up">-->
						<!--    <a href="uploadvids/upload.php" class="dropdown-toggle no-arrow">-->
								<!-- <span class="micon bi bi-diagram-3"></span
						<!--		> -->-->
						<!--		<i class="fa-solid fa-upload"></i>-->
						<!--		<span class="mtext">Upload Videos</span>-->
						<!--	</a>-->
						<!--</li>-->
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
				<?php
					$admin = mysqli_query($conn , "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    				$ad = mysqli_fetch_assoc($admin);							
    				if ($ad['type'] == "Admin") {
						$clor2="green";
						echo "<script>
    				    const element5 = document.getElementById('ad1');
    				    element5.remove();
    				    </script>"; 
    				}
    				else{
						echo "<script>
    				    const element5 = document.getElementById('up');
    				    const element6 = document.getElementById('up2');
    				    element5.remove();
    				    element6.remove();
    				    </script>"; 
    				}
				
				?>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 customscroll-10-p height-100-p xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Video Player</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item" aria-current="page">
											<a href="video-player.php">Videos</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Fe
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<!-- <div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Plyr HTML5 Video</h4>
								<p class="font-14 ml-0">
									A simple, accessible HTML5 media player
									<a
										href="https://github.com/sampotts/plyr"
										target="_blank"
										class="weight-700 text-blue"
										>Click Here</a
									>
								</p>
							</div>
						</div>
						<div class="container">
							controls
							<video
								poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg?v1"
								
								crossorigin
							>
							https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.mp4
								<source
								
									src="/upload/vid2.mp4"
									type="video/mp4"
								/>
								https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.webm
								<source
									src="/upload/vid2.mp4"
									type="video/webm"
								/>
							</video>
						</div>
					</div> -->
<!-- 
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Plyr HTML5 Audio</h4>
								<p class="font-14 ml-0">
									A simple, accessible HTML5 media player
									<a
										href="https://github.com/sampotts/plyr"
										target="_blank"
										class="weight-700 text-blue"
										>Click Here</a
									>
								</p>
							</div>
						</div>
						<div class="container">
							<audio controls>
								<source
									src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3"
									type="audio/mp3"
								/>
								<source
									src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.ogg"
									type="audio/ogg"
								/>
								Your browser does not support the audio element.
							</audio>
						</div>
					</div> -->

					<!-- <div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Plyr YouTube Video</h4>
								<p class="font-14 ml-0">
									A simple, accessible HTML5 media player
									<a
										href="https://github.com/sampotts/plyr"
										target="_blank"
										class="weight-700 text-blue"
										>Click Here</a
									>
								</p>
							</div>
						</div>
						<div class="container">
							<div data-type="youtube" data-video-id="bTqVqk7FSmY"></div>
						</div>
					</div> -->
					<!-- 
						<?php
			        	require 'connect.php';
			        	$query = mysqli_query($conn, "SELECT * FROM `videos2`") or die(mysqli_error());
			        	$queryy = mysqli_query($conn, "SELECT * FROM `videos2`") or die(mysqli_error());
			        	while($fetch = mysqli_fetch_array($query))
			        	while($fetch2 = mysqli_fetch_array($queryy)){
                    		$id= $fetch['id'];
                    		$id2= $fetch2['id'];
		            ?>
					<?php 
						$fetch2 = mysqli_fetch_array($queryy);
					  	echo
							"<div class='pd-20 card-box mb-30' style='width:390px;'>
								<div class='clearfix mb-20' style='width:300px;'>
									<div class='pull-left'>
										<h4 class='text-blue h4'> 
												{$fetch2['video_name']} 
										</h4>
									</div>
								</disv>
								<div class='container'>
									<video width='300' height='300' poster='{$fetch2['video_img']}' src='{$fetch2['video']}'></video>
								</div>
							</div>"
					?>
					<?php
						}
					?> -->
					<?php   
						require 'connect.php';
			        	$query = mysqli_query($conn, "SELECT * FROM `videos2`") or die(mysqli_error());
						// $fetcch = mysqli_fetch_array($query);
						     while($fetch =mysqli_fetch_array($query) )
						          {
						             ?>
						                  <div class="pd-20 card-box mb-30 " style="width:390px;">
											  <div class='clearfix mb-20'>
												  	<div class='pull-left'>
														<h4 class='text-blue h4'><?php echo $fetch['video_name']?></h4>
													</div>
												</div>

												<div class='container'>
													<video width='300' height='300' poster='<?php echo $fetch['video_img']?>' src=<?php echo $fetch['video']?>></video>
												</div>
						                  		</div>
								  			</div>
						              <?php
						          }
					?>   
					

					<!-- <div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Plyr Vimeo Video</h4>
								<p class="font-14 ml-0">
									A simple, accessible HTML5 media player
									<a
										href="https://github.com/sampotts/plyr"
										target="_blank"
										class="weight-700 text-blue"
										>Click Here</a
									>
								</p>
							</div>
						</div>
						<div class="container">
							<div data-type="vimeo" data-video-id="143418951"></div>
						</div>
					</div> -->
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box" style="position: relative;">
					<h6>Mainly Developed By
											
						<span style="color: blue;">Moaz Hazem</span><br></h6>
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
		<script src="src/plugins/plyr/dist/plyr.js"></script>
		<script src="https://cdn.shr.one/1.0.1/shr.js"></script>
		<script>
			plyr.setup({
				tooltips: {
					controls: !0,
				},
			});
		</script>
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

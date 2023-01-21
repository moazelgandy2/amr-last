<?php
	require_once 'connect.php';
	
	if(ISSET($_POST['save'])){
		$product_name = $_POST['video_name'];
		$image_name = $_FILES['video_img']['name'];
		$image_temp = $_FILES['video_img']['tmp_name'];
		$image_size = $_FILES['video_img']['size'];
		$video_name = $_FILES['video']['name'];
		$video_temp = $_FILES['video']['tmp_name'];
		$video_size = $_FILES['video']['size'];
		
		
		if($image_size > 50000000000000000){
			echo "<script>alert('File too large to upload')</script>";
			echo "<script>window.location = '../uploadvids/upload.php'</script>";
		}else{
			$file = explode(".", $image_name);
		        $file2 = explode(".",$video_name);
			$file_ext = end($file);
			$file2_ext = end($file2);
			$ext = array("mp4","png", "jpg", "jpeg");
 
			if(in_array($file_ext, $ext))
            		if(in_array($file2_ext,$ext)){
				$location = "../uploads/".$image_name;
                		$location2 = "../uploads/".$video_name;
				if(move_uploaded_file($image_temp, $location))
				if(move_uploaded_file($video_temp, $location2)){
					mysqli_query($conn, "INSERT INTO videos (video_name, video, video_img) VALUES ('{$product_name}', '{$location2}', '{$location}')") or die(mysqli_error());
					echo "<script>alert('Video Saved!')</script>";
					echo "<script>window.location = '../uploadvids/upload.php'</script>";
				}
			}else{
				echo "<script>alert('Only images allowed')</script>";
				echo "<script>window.location = '../uploadvids/upload.php'</script>";
			}
		}
		
		
	}
?>

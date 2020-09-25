<?php
include('../../inc/connection.php');

if (isset($_REQUEST['category'])) {
	$category = $_REQUEST['category'];

	//echo $password;

	if (empty($category) ) {
		//echo $fname;
		?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Fill all the required Fields.</div>
		<script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'category.php';

                        }, 1000);
		</script>
	<?php
	}else{
		$new_category= "INSERT INTO category(name)
						 VALUES('$category')"
						 or die("Error creaeting the user profile");
		$new_category_r = mysqli_query($connection,$new_category) or die("Error");
		if (!$new_category_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php
			/*echo "Failed";*/
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>&nbsp;&nbsp;Category Succesfully Added.
	</div>

		<script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'category.php';

                        }, 200);
		</script>


		<?php
			/*header("location:landing.php?msg=1");*/
		}
	}


}



?>
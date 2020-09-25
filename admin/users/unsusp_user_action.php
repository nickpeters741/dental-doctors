<?php
session_start();
include('../../inc/connection.php');
if (isset($_REQUEST['staff_id'])) {
    $staff_id = $_REQUEST['staff_id'];
    $update_unsusp = mysqli_query($connection,"UPDATE users SET work_status='1' WHERE staff_id='$staff_id'") or die("Could not update users");


    if ( !$update_unsusp) {
        ?>
        <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error Deleting Customer Details.</div>
        <script type="text/javascript">
            window.setTimeout(function(){
                window.location.href = 'user_index.php';
            }, 200);
        </script>

        <?php
    }else{
        ?>
        <div class="alert alert-Success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> User has Been Unsuspended.</div>
        <script type="text/javascript">
            window.setTimeout(function(){

                window.location.href = 'user_index.php';

            }, 1000);
        </script>

        <?php
    }
}



?>
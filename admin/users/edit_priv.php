<?php

include("../../inc/connection.php");
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		//echo $id;
        $get_priv_details = mysqli_query($connection,"SELECT * FROM roles WHERE role_id='$id'") or die("Could not get the role details");

        $row = mysqli_fetch_assoc($get_priv_details);
    }
?>

        <form role="form" action="edit_priv_action.php" role="form"  method="post" style="">          
            <fieldset>

                             <div class="" style="border-top: none;">
                                <div class="form-group ">
                                <label>Priviledge Name</label>
                                <input type="text" class="form-control" name="name" id="name"  value="<?php echo $row['name']; ?>" required / >
                            </div> 
                             </div>

                            
                        
                             <input type="hidden" class="form-control" name="role_id" id="role_id" value="<?php echo $row['role_id']; ?>" required/>
					
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
								<button type="submit" name="edit_priv" class="btn btn-success">Save</button>
							</div>
                        </fieldset>
					 </form>
                    
					


		<!--modal add-->
		

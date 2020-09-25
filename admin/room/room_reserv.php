 <form role="form" action="edit_user_action.php" role="form"  method="post" style="margin-top: 30px;">          
            <fieldset>
                    <div class="form-group row">
                             <div class="col-md-6" style="border-top: none;">
                                <div class="form-group ">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"  value="<?php echo $row['name']; ?>" placeholder="Full Name..." required / >
                            </div> 
                             </div>

                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username"  value="<?php echo $row['username']; ?>" placeholder="Username..." required />
                            </div>

                            <div class="form-group col-md-6">
                                <label>National ID</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $row['nid']; ?>" placeholder="Enter Email..." required />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone Number..." required />
                            </div>
                            <div class="form-group col-md-6">
                                <label >User Roles</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="">-----------Select Role-------------------</option>
                                    <?php
                                    $role = mysqli_query($connection,"SELECT * FROM roles") or die(mysql_error());
                                    while($fetch_r=mysqli_fetch_assoc($role)) {
                                        ?>

                                        <option value="<?=$fetch_r['permission']?>"><?=$fetch_r['name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="staff_id" id="staff_id" value="<?php echo $row['staff_id']; ?>" required/>
                        <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                                <button type="submit" name="edit_user" class="btn btn-success">Save</button>
                            </div>
                        </fieldset>
                     </form>
                     <!--modal add-->
        

    <?php

    include('../../inc/connection.php');
    include('../includes/functions.php'); 
     if(isset($_REQUEST['id']))
    	{
    		$id = $_REQUEST['id'];
    		
        }
    ?>
    <div class="panel panel-success" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div><h1 class="panel-title">Check in customer</h1></div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="checkin_action.php"  data-parsley-validate="true" >
                     <div class="form-group row">
                        <div class="form-group  col-md-4">
                            <label>Check in</label>
                            <input type="date" class="form-control" name="in"  data-parsley-required="true" data-date-start-date="01-11-2018" />
                        </div> 
                        <div class="form-group col-md-4">
                            <label>Check Out</label>
                            <input type="date" class="form-control"  name="out"  data-parsley-required="true" />
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Pax:</label>
                            <input type="text" class="form-control"  name="pax1"  data-parsley-required="true" /> 
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Days:</label>
                            <input type="text" class="form-control" id="day1" name="day"  data-parsley-required="true" /> 
                            <input type="hidden" class="form-control" name="guest" value="<?php echo $id; ?>">
                        </div>
                        
                        <div class="form-group col-md-5">
                            <label>Room</label>
                            <select class="form-control" id="room1" name="rooms">
                                  <option >----Select Room----</option>
                                 <?php
                                  $cat = "SELECT * FROM room WHERE status=2";
                                  $cat_r = mysqli_query($connection,$cat) or die("Error getting room");
                                  while ($ct = mysqli_fetch_assoc($cat_r)) {
                                      $room_no = $ct['room_no'];
                                      $room_id = $ct['room_id'];
                                      $cat_id = $ct['cat_id'];
                                      ?>
                                      <option  value="<?php echo $room_id; ?>"><?php echo get_cat($cat_id)." ".$room_no ;?></option>
                                      <?php
                                  }
                                  ?>
                            </select>
                        </div> 
                        <div class="form-group col-md-3">
                                    <label>Package</label> 
                                        <div class="radio radio-css is-valid">
                                            <input type="radio" name="package" id="bo1" value="bo" />
                                            <label for="bo1">Bed Only</label>
                                        </div>
                                        <div class="radio radio-css is-valid">
                                            <input type="radio" name="package" id="bb1" value="bb" />
                                            <label for="bb1">Bed & Breakfast</label>
                                        </div>  
                        </div>
                        <div class="form-group col-md-4"  style="display: none" id="breakfast1">
                          <label>Breakfast</label> 
                              <div class="radio radio-css is-valid">
                                  <input type="radio" name="bfast" id="set1" value="200" />
                                  <label for="set1">set (200)</label>
                              </div>
                              <div class="radio radio-css is-valid">
                                  <input type="radio" name="bfast" id="exp1" value="300" />
                                  <label for="exp1">Express (300)</label>
                              </div>
                              <div class="radio radio-css is-valid">
                                  <input type="radio" name="bfast" id="fit1" value="500" />
                                  <label for="fit1">Fit (500)</label>
                              </div> 
                        </div>
                        
                      </div> 
                      <div class="form-group row">
                        
                        <div class="form-group col-md-3 col-sm-3">
                            <label>Bed:</label>
                            <input class="form-control" type="text" id="bed1" name="bed" placeholder="Required" data-parsley-required="true" />
                        </div>
                        <div class="form-group col-md-3 col-sm-3">
                            <label>Breakfast:</label>
                            <input class="form-control" type="text" id="break1" name="break" value="0" placeholder="Required" data-parsley-required="true" />
                        </div>
                        <div class="form-group col-md-3 col-sm-3">
                            <label>Disc:</label>
                            <input class="form-control" type="text" id="disc" name="disc" placeholder="Discount" />
                        </div>
                        <div class="form-group  col-md-4 col-sm-3">
                            <label>Mode</label>
                            <select class="form-control" id="mode" name="mode" data-parsley-required="true">
                                <option value="1">Cash</option>
                                <option value="2">Mpesa</option>
                                <option value="2">Visa</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label>Amount Tendered:</label>
                            <input class="form-control" type="text" id="tender1" name="tendered"  onkeyup="calculate();"  data-parsley-required="true" />
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label>Remarks:</label>
                           <!--  <input class="form-control" type="text" id="ref" name="ref" data-parsley-required="true" /> -->
                            <textarea  class="form-control" type="text" id="ref" name="ref" data-parsley-required="true" ></textarea>
                        </div>
                    </div>  
                    <div class="form-group row m-b-0 pull-right"> 
                        <div class="col-md-8 col-sm-8"> 
                <button type="submit" class="btn btn-sm  btn-warning" name="reserve" id="reserv1" disabled="true" >Reserve</button>
                <button type="submit" class="btn btn-sm  btn-lime" name="checkin" id="issue1" disabled="true" >Issue</button> 
                 
                        </div>
                    </div>
                </form>
    		</div>
    	</div>
<script>
    $(document).ready(function() { 
       $("#set1").click(function(event){ 
         bcash = document.getElementById('set1').value;
        document.getElementById('break1').value = bcash;

      }); 
      $("#exp1").click(function(event){ 
         bcash = document.getElementById('exp1').value;
        document.getElementById('break1').value = bcash;

      }); 
      $("#fit1").click(function(event){ 
         bcash = document.getElementById('fit1').value;
        document.getElementById('break1').value = bcash;

      }); 
      $("#bb1").click(function(event){ 
        document.getElementById('breakfast1').style.display='block';
      });
      $("#bo1").click(function(event){ 
        document.getElementById('breakfast1').style.display='none';
      }); 
      $("#room1").change(function(event){ 
        var selected = $(this).val();
          $.ajax({  
            type: "GET",
            url: 'get_amount.php',
            // Your creation of the data object is incorrect
            data: { id: selected },
              success:  function(data) {
              console.log(data);
              // Here just append the straight data
              $('#bed1').val(data);
            }
            });
        });
    });
function calculate()
        {
           day = document.getElementById('day1').value; //received amount

          cash = document.getElementById('tender1').value; //received amount

          bed = document.getElementById('bed1').value; //received amount

          breakfast = document.getElementById('break1').value; //customers note  

          

          var amount =  (parseInt(bed) + parseInt(breakfast))*day;



          console.log(amount);
          balance = cash - amount;
          console.log( "balance "+balance); 

         if (balance >= 0) {
            document.getElementById("reserv1").disabled = false;
            document.getElementById("issue1").disabled = false;
          } else{
            document.getElementById("reserv1").disabled = true;
            document.getElementById("issue1").disabled = true;
          }

        }

    </script>  
    <!-- <script>
        $(document).ready(function() {
        $("#room1").change(function(event){
            // You just get the value of selected input
            // You don't need to find anything because you've already selected it
            var selected = $(this).val();

            console.log(selected);
            $('#type1').removeAttr('disabled');
            $('#type1').empty();
            $.ajax({ 
                    type: "GET",
                    url: 'get_amount.php',
                    // Your creation of the data object is incorrect
                    data: { id: selected },
                    success:  function(data) {
                        console.log(data);
                        // Here just append the straight data
                        $('#type1').append(data);
                    }
            });
        });

       $("#type1").change(function(event){
        var selected = $(this).val();
    document.getElementById('amount1').value = selected;

        });
    });
    </script> -->
   <!--  <script type="text/javascript">                       

    // Add your custom JS code here
    $( document ).ready(function() {
        // Handler for .ready() called.
        document.getElementById('edit_customer').addEventListener('click', edit_customer);
            function edit_customer()
            {
                $('#edit_customer').text('');
                $('#edit_customer').append('<span> Please wait... </span>');
                $('#edit_customer').attr('disabled',true);

                var name = $("#name1").val();
                var phone = $("#phone1").val();
                var gender = $("#gender1").val();
                var nid = $("#nid1").val();
                var cust_id = $("#cust_id1").val();

                console.log(name);
                console.log(phone) ;

                $.ajax(
                    {
                        url: 'edit_cust_action.php',
                        typr: 'POST',                           
                        data: 'name='+name+'&phone='+phone+'&gender='+gender+'&nid='+nid+'&cust_id='+cust_id,
                        dataType: 'html'
                    })

                    .done(function(data)
                     {
                        $('#results2').html(''); // blank before load.
                        $('#results2').html(data);

                    })

                    .fail(function()
                    {
                        $('#results2').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error occured Try Again.</div>');
                        
                    });
            }

        });
                        </script> -->
    					

     
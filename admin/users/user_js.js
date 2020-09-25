
// Add your custom JS code here
$(document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('btn-user').addEventListener('click', user);
    
        function user()
        {
            $('#btn-user').text('');
            $('#btn-user').append('<span> Please wait... </span>');
            $('#btn-user').attr('disabled',true);

            var staff = $("#staff").val();
            var username = $("#username").val(); 
            var roles = $("#roles").val();
            var password = $("#pass").val();
            var confirmpass = $("#cpass").val();

            console.log(confirmpass);
            console.log(staff);  

            if( password != confirmpass)
            {
                $('#results').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Passwords Do Not Match!!.</div>');
            }else{

            $.ajax(
                {
                    url: 'user_action.php',
                    typr: 'POST',                           
                    data: 'staff='+staff+'&username='+username +'&roles='+roles+'&password='+password,
                    dataType: 'html'
                })
                .done(function(data)
                 {
                    $('#results').html(''); // blank before load.
                    $('#results').html(data);

                })

                .fail(function()
                {
                    $('#results').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error occured.</div>');
                    
                        window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 1000);
                });
        }
    }


     document.getElementById('btn-priviledge').addEventListener('click', priviledge);
    
        function priviledge()
        {
            $('#btn-priviledge').text('');
            $('#btn-priviledge').append('<span> Please wait... </span>');
            $('#btn-priviledge').attr('disabled',true);

            var priviledge = $("#priv").val();
            var perm = $("#perm").val();


            console.log(priv);

            $.ajax(
                {
                    url: 'priv_action.php',
                    typr: 'POST',                           
                    data: 'priviledge='+priviledge+'&perm='+perm,
                    dataType: 'html'
                })
                .done(function(data)
                 {
                    $('#results').html(''); // blank before load.
                    $('#results').html(data);

                })

                .fail(function()
                {
                    $('#results').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error occured.</div>');
                    
                        window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 1000);
                });
        }

    });




    
    $(document).ready(function()
    {
        $(document).on('click','#changepass', function(e)
        {
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);

            $('#dynamic-content').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
            {
                url: 'changepass.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
            })
            .done(function(data)
            {
                console.log(data);
                $('#dynamic-content').html(''); // blank before load.
                $('#dynamic-content').html(data);

            })

            .fail(function()
            {
                $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                  $('#modal-loader').hide();
            });
        });

         $(document).on('click','#edituser', function(e)
        {
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);
            $('#edit_name').html('Edit User'); 

            $('#dynamic-content3').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
            {
                url: 'edit_user.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
            })
            .done(function(data)
            {
                console.log(data);
                $('#dynamic-content1').html(''); // blank before load.
                $('#dynamic-content1').html(data);

            })

            .fail(function()
            {
                $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                  $('#modal-loader').hide();
            });
        });


         $(document).on('click','#editpriv', function(e)
        {
            e.preventDefault();

            $('#edit_name').html('Edit priviledge');                  

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);

            $('#dynamic-content').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
            {
                url: 'edit_priv.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
            })
            .done(function(data)
            {
                console.log(data);
                $('#dynamic-content4').html(''); // blank before load.
                $('#dynamic-content4').html(data);

            })

            .fail(function()
            {
                $('#dynamic-content4').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                  $('#modal-loader').hide();
            });
        });




        $(document).on('click','#deleteuser', function(e)
        {
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);

            $('#dynamic-content2').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
            {
                url: 'del_user.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
            })
            .done(function(data)
            {
                console.log(data);
                $('#dynamic-content2').html(''); // blank before load.
                $('#dynamic-content2').html(data);

            })

            .fail(function()
            {
                $('#dynamic-content1').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                  $('#modal-loader').hide();
            });
        });

//suspend user information
        $(document).on('click','#suspuser', function(e)
        {
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);

            $('#dynamic-content8').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
                {
                    url: 'susp_user.php',
                    typr: 'POST',
                    data: 'id='+uid,
                    dataType: 'html'
                })
                .done(function(data)
                {
                    console.log(data);
                    $('#dynamic-content8').html(''); // blank before load.
                    $('#dynamic-content8').html(data);

                })

                .fail(function()
                {
                    $('#dynamic-content1').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });
        });

//unsuspend user information
        $(document).on('click','#unsuspuser', function(e)
        {
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);

            $('#dynamic-content9').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
                {
                    url: 'unsusp_user.php',
                    typr: 'POST',
                    data: 'id='+uid,
                    dataType: 'html'
                })
                .done(function(data)
                {
                    console.log(data);
                    $('#dynamic-content9').html(''); // blank before load.
                    $('#dynamic-content9').html(data);

                })

                .fail(function()
                {
                    $('#dynamic-content1').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });
        });

        $(document).on('click','#delpriv', function(e)
        {
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            console.log(uid);

            $('#dynamic-content2').html(''); // leave this diff blank
            $('#modal-loader').show(); // load ajax loader button cliked

            $.ajax(
            {
                url: 'del_priv.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
            })
            .done(function(data)
            {
                console.log(data);
                $('#dynamic-content2').html(''); // blank before load.
                $('#dynamic-content2').html(data);

            })

            .fail(function()
            {
                $('#dynamic-content1').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                  $('#modal-loader').hide();
            });
        });

    });
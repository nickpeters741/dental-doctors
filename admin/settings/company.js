 

// Add your custom JS code here
$(document ).ready(function(){
    // Handler for .ready() called.
    document.getElementById('btn-comp').addEventListener('click', add_co);
     
        function add_co(){
            $('#btn-comp').text('');
            $('#btn-comp').append('<span> Please wait... </span>');
            $('#btn-comp').attr('disabled',true);
            var name = $("#name").val();
            var location = $("#location").val();
            var floor = $("#floor").val();
             var myform = document.getElementById("comp");
    var fd = new FormData(myform ); 
            console.log(name);
            $.ajax(
            {
                url: "company_action.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
            })
            .done(function(data){
                $('#results').html(''); // blank before load.
                $('#results').html(data);
            })
            .fail(function()
                {
                    $('#results').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error occured.</div>');
                    window.setTimeout(function(){
                        window.location.href = 'apartment.php';
                    }, 1000);
                });
        }
    });


 $(document).ready(function() {
    $(document).on('click','#edit_comp', function(e)
    { e.preventDefault();
      var uid = $(this).data('id'); // get id of clicked row
      console.log(uid);
      $('#dynamic-content').html(''); // leave this diff blank
      $('#modal-loader').show(); // load ajax loader button cliked
      $.ajax( {
            url: 'company_edit.php',
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

    $(document).on('click','#deletecat', function(e) {
        e.preventDefault();
        var uid = $(this).data('id'); // get id of clicked row
        console.log(uid);
        $('#dynamic-content1').html(''); // leave this diff blank
        $('#modal-loader').show(); // load ajax loader button cliked
        $.ajax( {
            url: 'apart_del.php',
            typr: 'POST',
            data: 'id='+uid,
            dataType: 'html'
        })
        .done(function(data) {
            console.log(data);
            $('#dynamic-content1').html(''); // blank before load.
            $('#dynamic-content1').html(data);
        }) 
        .fail(function(){
            $('#dynamic-content1').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
              $('#modal-loader').hide();
        });
    }); 

});




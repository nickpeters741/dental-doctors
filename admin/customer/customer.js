

// Add your custom JS code here
$( document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('#btn-customer').addEventListener('click', customer);
        function customer()
        {
            $('#btn-customer').text('');
            $('#btn-customer').append('<span> Please wait... </span>');
            $('#btn-customer').attr('disabled',true);

            var name = $("#name").val();
            var phone = $("#phone").val();
            var nid = $("#nid").val();
            var gender = $("#gender").val(); 
            var branch = $("#branch option:selected").val(); 

             console.log(room); 
            $.ajax(
                {
                    url: 'customers_action.php',
                    typr: 'POST',                           
                    data: 'name='+name+'&phone='+phone+'&nid='+nid+'&gender='+gender+'&branch='+branch,
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
                    
                });
        }

    });
 

// Add your custom JS code here
$(document ).ready(function(){

    document.getElementById('btn-save').addEventListener('click', house);
        function house(){
            $('#btn-save').text('');
            $('#btn-save').append('<span> Please wait... </span>');
            $('#btn-save').attr('disabled',true);
            var name = $("#nam").val(); 
            var add = $("#add").val();
            var mail = $("#mail").val();
            var phone = $("#phone").val(); 

            console.log(name);
            $.ajax(
            {
                url: 'branch_action.php',
                typr: 'POST',                           
                data: 'name='+name+'&add='+add+'&mail='+mail+'&phone='+phone,
                dataType: 'html'
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
 
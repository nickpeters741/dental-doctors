
// Add your custom JS code here
$(document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('add').addEventListener('click', user);
    
        function user()
        {
            $('#add').text('');
            $('#add').append('<span> Please wait... </span>');
            $('#add').attr('disabled',true);

            var name = $("#name").val();
            var nhif = $("#nhif").val();
            var id = $("#id").val();
            var phone = $("#phone").val();
            var cat = $("#role1 option:selected").val();
            var gender = $("#gender option:selected").val();
            var nssf = $("#nssf").val();
            var dob = $("#dob").val();
            var acc = $("#acc").val();
            var resi = $("#resi").val();
            var marital = $("#marital option:selected").val();

            console.log(name);
            console.log(nhif);
            console.log(id);
            console.log(phone);
            console.log(cat);
            console.log(nssf);
            console.log(dob);
            console.log(acc);
            console.log(marital);
            console.log(gender);
            console.log(resi);

            $.ajax(
                {
                    url: 'staff_action.php',
                    typr: 'POST',                           
                    data: 'name='+name+'&nhif='+nhif+'&id='+id+'&cat='+cat+'&nssf='+nssf+'&dob='+dob+'&acc='+acc+'&phone='+phone+'&resi='+resi+'&marital='+marital+'&gender='+gender,
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
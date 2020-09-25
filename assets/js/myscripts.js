 function delete_this(item_id){
    var item_id = item_id;
    $.ajax({
        type: "POST",
        url:"delete_order_item.php",
        data:"item_id="+item_id,
        success:function(data){
            
        }
    })
 }  

  
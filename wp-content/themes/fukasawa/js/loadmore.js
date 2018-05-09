jQuery(function($)
{
$(document).ready(function(){

  //infinite scroll
    $(document).on('click', '#btn_more', function(){  
           var last_deal_id = $(this).data("deal");  
           $('#btn_more').html("Loading...");
           var ajaxurl = '/wp-admin/admin-ajax.php';
           $.ajax({  
                url:ajaxurl,  
                type:"POST",  
                data:{
                  'last_deal_id' : last_deal_id,
                  'action' : 'loadmore',
                },  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove_row').remove();  
                          $('#posts').append(data);
                          //alert(last_deal_id);  
                     }  
                     else  
                     {  
                          $('#btn_more').html("No Data");  
                     }  
                },
                error:function(){
                  //alert(last_deal_id);
                },
                complete:function(){
                  //$('#posts').addClass('new').masonry();
                }
           }); 
           //$('#posts').masonry().html('<p>Finished</p>'); 
      });


});

});
jQuery(function($) {
  $(document).ready(function() {

    //date filter sections
   $('.filter_date a[href^="#"]').click(tabs);

    function tabs(e) {
      var $this = $(this);

      e.preventDefault();
      $this.closest('.filter_date').find('a').removeClass('active');
      $this.addClass('active');
      $this.closest('.filter_date').nextAll('.deals_wrapper').css('display', 'none');
      $(this.hash).stop().fadeIn(400).masonry();
    }

    //infinite scroll
    $(document).on('click', '#btn_more', function(){  
           var last_deal_id = $(this).data("deal");  
           $('#btn_more').html("Loading...");  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{last_deal_id:last_deal_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove_row').remove();  
                          $('#posts').append(data);  
                     }  
                     else  
                     {  
                          $('#btn_more').html("No Data");  
                     }  
                }
                error: 
           });  
      }); 



  });

});
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

     $('#btn_more').on('click', function () {
        $('#posts').addClass('added').masonry();
      });
    
  });

});
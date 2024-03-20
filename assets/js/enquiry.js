;(function($){
     $('#wpcrud-enquiry-form form').on('submit', function(e) {
         e.preventDefault();

         var  data = $(this).serialize();

         $.post(wpCrud.ajaxurl, data, function ( response ){
            if (response.success) {
                console.log(response.success);
            }else{
                alert(response.data.message);
            }
         }).fail(function(){
                 alert(wpCrud.error);
             })

     });
})(jQuery);
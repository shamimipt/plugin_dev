;(function($){
   $('table.wp-list-table.contact').on('click', 'a.submitdelete', function(e){
       e.preventDefault();

        if ( !confirm(wpCrud.confirm) ) {
            return;
        }

        var self = $(this),
            id = self.data('id');

        wp.ajax.send('wpcrud-delete-contact', {
            data: {
                id: id,
                _wpnonce: wpCrud.nonce
            }
        }).done(function(response){
            self.closest('tr')
                .css('background-color', 'red')
                .hide(400, function(){
                    $(this).remove();
                });
        }).fail(function(){
            alert(wpCrud.error);
        });

   });

})(jQuery);
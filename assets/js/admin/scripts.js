(function($) {

  /* ---
    Closing admin notice
  --- */

    var isHidden = false;

    $(document).on('click', '.notice[data-notice=buybox-widget] .notice-dismiss', function() {

      if (isHidden)
        return;

      $.ajax(ajaxurl, {
        type: 'POST',
        data: {
          action : 'buybox_widget_notice'
        }
      });

    });

    $(document).on('click', '.notice[data-notice=buybox-widget] .button[data-permanently]', function(e) {

      e.preventDefault();

      isHidden = true;
      $('.notice[data-notice=buybox-widget] .notice-dismiss').click();

      $.ajax(ajaxurl, {
        type: 'POST',
        data: {
          action      : 'buybox_widget_notice',
          permanently : 1
        }
      });

    });

})(jQuery);
<?php

  namespace BuyBoxWidget\Settings;

  class Error {

    public function __construct() {

      add_action('admin_notices', [$this, 'showErrorNotice']);

    }

    /* ---
      Functions
    --- */

      public function showErrorNotice() {

        $screen = get_current_screen();

        if (!isset($screen->base) || ($screen->base != 'settings_page_bbw_admin_page') || !get_option('buybox_api_error', false))
          return;

        ?>
          <div class="notice notice-error is-dismissible">
            <p><?= __('Wystąpił błąd przy pobieraniu informacji z API. Sprawdź poprawność wartości podanych poniżej i spróbuj ponownie. W razie dalszych problemów prosimy o kontakt z nami.', 'buybox-widget'); ?></p>
          </div>
        <?php

      }

  }
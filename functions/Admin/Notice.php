<?php

  namespace BuyBoxWidget\Admin;

  class Notice {

    public function __construct() {

      add_action('admin_notices', [$this, 'showAdminNotice']);

      add_action('admin_init',                   [$this, 'hideNoticeByDefault']);
      add_action('wp_ajax_buybox_widget_notice', [$this, 'hideNotice']);

    }

    /* ---
      Functions
    --- */

      public function showAdminNotice() {

        if (get_option(BBW_NOTICE, false) === false) {

          $this->saveNoticeExpires();
          return;

        }

        if ((get_option(BBW_NOTICE, 0) >= time()) || (get_current_screen()->id != 'dashboard'))
          return;

        ?>
          <div class="notice notice-success is-dismissible" data-notice="buybox-widget">
            <h2>
              <?= __('Dziękujemy za używanie naszej wtyczki Widget BUY.BOX!', 'buybox-widget'); ?>
            </h2>
            <p>
              <?php echo sprintf(__('Daj nam znać co myślisz o naszej wtyczce. Dziękujemy za wszystkie recenzje oraz opinie. To jest dla nas bardzo ważne i pozwala nam rozwijać wtyczkę. %sJeżeli masz problem techniczny, skontaktuj się z nami zanim dodasz recenzję. Postaramy się Tobie pomóc!', 'buybox-widget'), '<br>'); ?>
            </p>
            <p>
              <a href="https://wordpress.org/support/plugin/buybox-widget/" target="_blank" class="button button-primary">
                <?= __('Uzyskaj pomoc techniczną', 'buybox-widget'); ?>
              </a>
              <a href="https://wordpress.org/support/plugin/buybox-widget/reviews/#new-post" target="_blank" class="button button-primary">
                <?= __('Dodaj recenzję', 'buybox-widget'); ?>
              </a>
              <a href="#" target="_blank" class="button" data-permanently>
                <?= __('Dodaj już recenzję, nie pokazuj ponownie', 'buybox-widget'); ?>
              </a>
            </p>
          </div>
        <?php

      }

    /* ---
      Turn off notice
    --- */

      public function hideNoticeByDefault() {

        if (get_option(BBW_NOTICE, false) !== false)
          return;

        $expires = strtotime('+1 week');
        $this->saveNoticeExpires($expires);

      }

      public function hideNotice() {

        $isPermanent = isset($_POST['permanently']) && $_POST['permanently'];
        $expires     = strtotime($isPermanent ? '+10 years' : '+1 month');

        $this->saveNoticeExpires($expires);

      }

      public function saveNoticeExpires($expires = 0) {

        $expires = $expires ? $expires : strtotime('+1 week');

        if (get_option(BBW_NOTICE, false) !== false)
          update_option(BBW_NOTICE, $expires);
        else
          add_option(BBW_NOTICE, $expires);

      }

  }
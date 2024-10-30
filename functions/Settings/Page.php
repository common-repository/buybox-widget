<?php

  namespace BuyBoxWidget\Settings;

  class Page {

    private $core;

    public function __construct($core) {

      $this->core = $core;

      add_action('admin_menu', [$this, 'addSettingsPage']);

    }

    /* ---
      Functions
    --- */

      public function addSettingsPage() {

        add_submenu_page(
          'options-general.php',
          __('Widget BUY.BOX - ustawienia', 'buybox-widget'),
          __('Widget BUY.BOX', 'buybox-widget'),
          'manage_options',
          'bbw_admin_page',
          [$this, 'showSettingsPage']
        );

      }

      public function showSettingsPage() {

        $settings = [
          [
            'name'  => 'buybox_api_token',
            'label' => __('API Token', 'buybuy-widget'),
            'value' => get_option('buybox_api_token', '')
          ]
        ];

        $save     = new Save($this->core);
        $settings = $save->saveSettings($settings);

        ?>
          <div class="wrap bbwOptionPage">
            <h1 class="wp-heading-inline">
              <?= __('Widget BUY.BOX - ustawienia', 'buybuy-widget'); ?>
            </h1>
            <div class="bbwOptionPage__columns">
              <div class="bbwOptionPage__column">
                <form method="post">
                  <table class="widefat">
                    <thead>
                      <tr>
                        <th><?= __('Nazwa pola', 'buybuy-widget'); ?></th>
                        <th><?= __('Wartość pola', 'buybuy-widget'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($settings as $index => $option) : ?>
                        <tr>
                          <td>
                            <label for="bbw-<?= $index; ?>">
                              <?= $option['label']; ?>
                            </label>
                          </td>
                          <td>
                            <input type="text" id="bbw-<?= $index; ?>" name="<?= $option['name']; ?>" value="<?= $option['value']; ?>">
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <input type="submit" class="button button-primary" name="bbw_save" value="<?= __('Zapisz zmiany', 'buybuy-widget'); ?>">
                </form>
              </div>
              <div class="bbwOptionPage__column">
                <table class="widefat">
                  <thead>
                    <tr>
                      <th>
                        <?= __('Instrukcja', 'buybuy-widget'); ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p>
                          <?= sprintf(__(
                            '%sAPI Token%s możesz znaleźć w %sPanelu wydawcy%s w zakładce %sAPI%s.', 'buybuy-widget'),
                            '<strong>',
                            '</strong>',
                            '<a href="https://my.getbuybox.com/" target="_blank">',
                            '</a>',
                            '<strong>',
                            '</strong>'
                          ); ?>
                        </p>
                        <p>
                          <?= sprintf(
                            __('Więcej informacji na temat konfiguracji i wykorzystania tej wtyczki znajdziesz na %snaszej stronie%s.', 'buybuy-widget'),
                            '<a href="https://docs.getbuybox.com/wtyczka-do-wordpressa" target="_blank">',
                            '</a>'
                          ); ?>
                        </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php

      }

  }
<?php

  namespace BuyBoxWidget\Admin;
  use BuyBoxWidget\Settings\Config as Config;

  class I18n {

    public function __construct() {

      add_action('admin_print_scripts', [$this, 'showSettings'], 0);

    }

    /* ---
      Functions
    --- */

      public function showSettings() {

        $langs = [
          'title' => __('Widget BUY.BOX', 'buybox-widget'),
          'desc' => __('Wtyczka pozwala zintegrować Twoją witrynę z platformą BUY.BOX.', 'buybox-widget'),
          'editor_menu' => [
            'default' => __('Osadzony (standardowy widget)', 'buybox-widget'),
            'popover' => __('Popup (zaznacz fragment tekstu)', 'buybox-widget')
          ],
          'fields' => [
            'category' => __('Kategoria', 'buybox-widget'),
            'type'     => __('Typ danych', 'buybox-widget'),
            'number'   => __('Numer EAN/ISBN', 'buybox-widget'),
            'text'     => __('Tekst', 'buybox-widget')
          ],
          'popover_types' => [
            'label' => __('Aktywacja widżetu', 'buybox-widget'),
            'hover' => __('Hover', 'buybox-widget'),
            'click' => __('Kliknięcie', 'buybox-widget')
          ],
          'texts' => [
            'info' => sprintf(
              __('Jeżeli nie znasz danych produktów, przejdź do %shttps://my.getbuybox.com/widgeter/widget/generator%sgeneratora BUY.BOX%s.', 'buybox-widget'),
              '<a href=\"',
              '\" target=\"_blank\">',
              '</a>'
            ),
            'help' => sprintf(
              __('Masz wątpliwości? Coś nie wychodzi? Zajrzyj do %shttps://docs.getbuybox.com/wtyczka-do-wordpressa%spomocy%s!', 'buybox-widget'),
              '<a href=\"',
              '\" target=\"_blank\">',
              '</a>'
            ),
            'error' => __('Nie udało się poprawnie wczytać bloku BUY.BOX. Wybierz kategorię w sekcji po prawej stronie oraz uzupełnij pozostałe dane.', 'buybox-widget')
          ]
        ];

        $config     = new Config();
        $categories = $config->getCategories();

        ?>
          <script>
            if (typeof bbw === 'undefined')
              var bbw = {};

            bbw.langs    = JSON.parse('<?= json_encode($langs); ?>');
            bbw.settings = JSON.parse('<?= json_encode($categories); ?>');
          </script>
        <?php

      }

  }
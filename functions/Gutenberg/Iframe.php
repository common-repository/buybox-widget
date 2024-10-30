<?php

  namespace BuyBoxWidget\Gutenberg;

  class Iframe {

    private $core;

    public function __construct($core) {

      $this->core = $core;

      add_action('wp_ajax_buybox_widget_iframe', [$this, 'loadIframe']);

    }

    /* ---
      Functions
    --- */

      public function loadIframe() {

        $content = $this->core->widget->embed->buildWidget([
          'category' => isset($_GET['category']) ? $_GET['category'] : '',
          'ean'      => isset($_GET['ean']) ? $_GET['ean'] : '',
          'name'     => isset($_GET['name']) ? $_GET['name'] : '',
          'info'     => isset($_GET['info']) ? $_GET['info'] : ''
        ]);

        ?>
          <?= $content; ?>
          <script src="https://buybox.click/js/widget.min.js" defer></script>
        <?php

        wp_die();

      }

  }
<?php

  namespace BuyBoxWidget\Classic;

  class Shortcode {

    private $core;

    public function __construct($core) {

      $this->core = $core;

      add_shortcode('buybox-widget', [$this, 'insertWidget']);
      add_action('wp_footer',        [$this, 'embedJavascript'], 100);

    }

    /* ---
      Functions
    --- */

      public function insertWidget($atts, $content = null) {

        $content = $this->core->widget->embed->buildWidget($atts, $content);
        return $content;

      }

      public function embedJavascript() {
          ?>
            <script src="https://buybox.click/js/widget.min.js" defer></script>
          <?php

      }

  }
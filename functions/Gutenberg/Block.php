<?php

  namespace BuyBoxWidget\Gutenberg;

  class Block {

    private $core, $exists;

    public function __construct($core) {

      $this->core = $core;

      add_action('init',      [$this, 'registerBlock']);
      add_action('wp_footer', [$this, 'embedJavascript'], 100);

    }

    /* ---
      Functions
    --- */

      public function registerBlock() {

        if (!function_exists('register_block_type'))
          return;

        register_block_type('simply4net/buybox-widget', [
            'editor_script'   => 'buybox-widget-gutenberg',
            'style'           => 'buybox-widget-gutenberg',
            'attributes'      => [
              'category' => [
                  'type'    => 'string',
                  'default' => ''
              ],
              'type' => [
                  'type'    => 'string',
                  'default' => ''
              ],
              'ean' => [
                  'type'    => 'string',
                  'default' => ''
              ],
              'name' => [
                  'type'    => 'string',
                  'default' => ''
              ],
              'info' => [
                  'type'    => 'string',
                  'default' => ''
              ],
            ],
            'render_callback' => [$this, 'renderBlock']
        ]);

      }

      public function renderBlock($atts) {

        $content = $this->core->widget->embed->buildWidget($atts);
        return $content;

      }

      public function embedJavascript() {

        if (!$this->exists)
          return;

        ?>
          <script src="https://buybox.click/js/widget.min.js" defer></script>
        <?php

      }

  }
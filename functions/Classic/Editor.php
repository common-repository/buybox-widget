<?php

  namespace BuyBoxWidget\Classic;
  use BuyBoxWidget\Settings\Config as Config;

  class Editor {

    public function __construct() {

      add_filter('mce_buttons',          [$this, 'registerButton']);
      add_action('mce_external_plugins', [$this, 'buttonScripts']);

      add_action('after_setup_theme',    [$this, 'editorStyles']);
      add_filter('the_content',          [$this, 'removeHighlight']);

    }

    /* ---
      Functions
    --- */

      public function registerButton($buttons) {

        if (!$this->checkCategories())
          return $buttons;

        $buttons[] = 'buybox';
        $buttons[] = 'buybox-popover';
        return $buttons;

      }

      private function checkCategories() {

        $config     = new Config();
        $categories = $config->getCategories();

        foreach ($categories as $category) {

          if ($category['category_id'])
            return true;

        }

        return;

      }

      public function buttonScripts($plugins) {

        $plugins['buybox']         = BBW_HTTP . 'assets/js/classic/scripts.js';
        $plugins['buybox-popover'] = BBW_HTTP . 'assets/js/classic/scripts.js';
        return $plugins;

      }

      public function editorStyles() {

        $url = BBW_HTTP . 'assets/css/classic/styles.css';
        add_editor_style($url);

      }

      public function removeHighlight($content) {
        
        $content = preg_replace('/<span class="bb-widget-wrap">(.*?)<\/span>/i', '${1}', $content);
        return $content;

      }

  }
<?php

  namespace BuyBoxWidget\Gutenberg;

  class Assets {

    public function __construct() {

      add_filter('admin_enqueue_scripts', [$this, 'loadStyles']);
      add_filter('admin_enqueue_scripts', [$this, 'loadScripts']);

    }

    /* ---
      Functions
    --- */

      public function loadStyles() {

        wp_register_style(
          'buybox-widget-gutenberg',
          BBW_HTTP . 'assets/css/gutenberg/styles.css',
          ['wp-blocks'],
          BBW_VERSION
        );
        wp_enqueue_style('buybox-widget-gutenberg');

      }

      public function loadScripts() {

        wp_register_script(
          'buybox-widget-gutenberg',
          BBW_HTTP . 'assets/js/gutenberg/scripts.js',
          ['wp-api', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-element'],
          BBW_VERSION
        );
        wp_enqueue_script('buybox-widget-gutenberg');

      }

  }
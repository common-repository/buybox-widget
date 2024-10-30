<?php

  namespace BuyBoxWidget\Admin;

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
          'buybox-widget',
          BBW_HTTP . 'assets/css/admin/styles.css',
          '',
          BBW_VERSION
        );
        wp_enqueue_style('buybox-widget');

      }

      public function loadScripts() {

        wp_register_script(
          'buybox-widget',
          BBW_HTTP . 'assets/js/admin/scripts.js',
          'jquery',
          BBW_VERSION
        );
        wp_enqueue_script('buybox-widget');

      }

  }
<?php

  namespace BuyBoxWidget\Settings;

  class Cache {

    public function __construct() {

      $this->initCron();

      add_action('bbw_cache_settings', [$this, 'cacheSettings']);

    }

    /* ---
      Functions
    --- */

      private function initCron() {

        if (wp_next_scheduled('bbw_cache_settings'))
          return;

        wp_schedule_event(time(), 'hourly', 'bbw_cache_settings');

      }

      public function cacheSettings() {

        $token = get_option('buybox_api_token');
        $api   = new Api();
        $list  = $api->getSettings($token);

        if (!is_array($list)) {

          add_option('buybox_api_error', 1);
          return;

        }

        delete_option('buybox_api_error');
        $list = $this->updateSettings($list);

        if (!$list)
          return;

        $this->saveSettings($list);

      }

    /* ---
      Settings
    --- */

      private function updateSettings($values) {

        if (!$values)
          return;

        $config     = new Config();
        $categories = $config->getCategories();
        $list       = [];

        foreach ($categories as $index => $value) {

          $list[] = [
            'id'          => $index,
            'option'      => $value['option'],
            'category_id' => isset($values[$index]) ? $values[$index] : ''
          ];

        }

        return $list;

      }

      private function saveSettings($list) {

        foreach ($list as $option) {

          $key = 'buybox_id_' . $option['option'];

          if (get_option($key) !== false)
            update_option($key, $option['category_id']);
          else
            add_option($key, $option['category_id']);

        }

      }

  }
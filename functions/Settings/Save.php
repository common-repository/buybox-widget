<?php

  namespace BuyBoxWidget\Settings;

  class Save {

    private $core;

    public function __construct($core) {

      $this->core = $core;

    }

    /* ---
      Functions
    --- */

      public function saveSettings($list) {

        if (!isset($_POST['bbw_save']))
          return $list;

        foreach ($list as $index => $option) {

          $key = $option['name'];

          if (!isset($_POST[$key]))
            continue;

          $value = preg_replace('/[^a-zA-Z0-9]/', '', $_POST[$key]);

          if (get_option($key) !== false)
            update_option($key, $value);
          else
            add_option($key, $value);

          $list[$index]['value'] = $value;

        }

        $this->core->settings->cache->cacheSettings();

        return $list;

      }

  }
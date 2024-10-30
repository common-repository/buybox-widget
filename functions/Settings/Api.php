<?php

  namespace BuyBoxWidget\Settings;

  class Api {

    /* ---
      Functions
    --- */

      public function getSettings($token) {

        if (!$token)
          return;

        $url = sprintf(
          'https://api.buybox.click/api/v1/buyboxes?profile=bb-plugin-wp&api-token=%s',
          $token
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result   = curl_exec($ch);
        $response = json_decode($result, true);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (!$response || ($status !== 200))
          return;

        $response = $this->generateSettingsList($response);
        return $response;

      }

      private function generateSettingsList($settings) {

        $list = [];

        foreach ($settings as $option) {

          $categoryID        = $option['category']['id'];
          $list[$categoryID] = $option['id'];

        }

        return $list;

      }

  }
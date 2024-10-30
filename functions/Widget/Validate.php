<?php

  namespace BuyBoxWidget\Widget;

  class Validate {

    /* ---
      Functions
    --- */

      public function validateData($data) {

        if (!$data['category']) {

          $url = get_permalink();
          error_log(sprintf('BUY-BOX widget Error: Unknown category type in shortcode on the page: %s', $url));
          return;

        }

        if (!$data['bbid'] || !is_numeric($data['bbid'])) {

          $url = get_permalink();
          error_log(sprintf('BUY-BOX widget Error: Invalid category ID in shortcode on the page: %s', $url));
          return;

        }

        if (!$data['ean'] && !$data['name'] && !$data['info']) {

          $url = get_permalink();
          error_log(sprintf('BUY-BOX widget Error: No required data in shortcode on the page: %s', $url));
          return;

        }

        if ($data['ean'] && (!is_numeric($data['ean']) || ((strlen($data['ean']) != 8) && (strlen($data['ean']) != 13)))) {

          $url = get_permalink();
          error_log(sprintf('BUY-BOX widget Error: Invalid ISBN / EAN code in shortcode on the page: %s', $url));
          return;

        }

        if (!$data['ean'] && (!$data['name'] || !$data['info'])) {

          $url = get_permalink();
          error_log(sprintf('BUY-BOX widget Error: Invalid name / info value in shortcode on the page: %s', $url));
          return;

        }

        return true;

      }

  }
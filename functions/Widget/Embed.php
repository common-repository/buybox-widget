<?php

  namespace BuyBoxWidget\Widget;
  use BuyBoxWidget\Settings\Config as Config;

  class Embed {

    private $count = 0;

    /* ---
      Functions
    --- */

      public function buildWidget($atts, $content = null) {

        $validate = new Validate();
        $current  = $this->findCategory($atts['category']);
        $data     = array_merge([
          'category'      => '',
          'bbid'          => isset($current['category_id']) ? $current['category_id'] : false,
          'ean'           => false,
          'name'          => false,
          'info'          => false,
          'popover'       => $content ? true : false,
          'popover-event' => '',
        ], $atts);

        if (!$current)
          $data['category'] = '';

        if (!$validate->validateData($data))
          return;

        $this->count++;
        $id = str_pad($this->count, 2, '0', STR_PAD_LEFT);

        if (!$content) {

          $content = '<div class="bb-widget" id="buybox-' . $id . '" ' . $this->getAttributes($data) . '></div>';

        } else {

          $content = '<a href="#" class="bb-widget" id="buybox-' . $id . '" ' . $this->getAttributes($data) . '>' . $content . '</a>';

        }

        return $content;

      }

      private function findCategory($category) {

        $config     = new Config();
        $categories = $config->getCategories();

        foreach ($categories as $item) {

          if ($item['category'] == $category)
            return $item;

        }

        return;

      }

      private function getAttributes($data) {

        $content = 'data-bb-id="' . $data['bbid'] . '"';

        if ($data['ean'])
          $content .= ' data-bb-number="' . $data['ean'] . '"';
        else if ($data['name'] && $data['info'])
          $content .= ' data-bb-name="' . $data['name'] . '" data-bb-info="' . $data['info'] . '"';

        if ($data['popover']) {

          $content .= ' onclick="event.preventDefault();" data-bb-type="popover"';

          if ($data['popover-event'] && ($data['popover-event'] == 'click'))
            $content .= ' data-bb-popover-event="click"';

        }

        $content .= ' data-bb-wp="' . get_bloginfo('version') . '" data-bb-wp-plugin="' . BBW_VERSION . '"' ;

        return $content;

      }

  }
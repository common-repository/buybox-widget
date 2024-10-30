<?php

  namespace BuyBoxWidget\Settings;

  class Config {

    /* ---
      Functions
    --- */

      public function getCategories() {

        $list = [
          1 => [
            'label'     => __('Książki', 'lang'),
            'option'    => 'books',
            'category'  => 'book',
            'shortcode' => [
              'ean'   => __('Podaj numer ISBN', 'lang'),
              'name'  => __('Podaj tytuł', 'lang'),
              'info'  => __('Podaj autora', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer ISBN lub tytuł i autora.', 'buybox-widget')
            ]
          ],
          2 => [
            'label'     => __('Filmy', 'lang'),
            'option'    => 'movies',
            'category'  => 'movie',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj tytuł', 'lang'),
              'info'  => __('Podaj reżysera', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub tytuł i reżysera.', 'buybox-widget')
            ]
          ],
          3 => [
            'label'     => __('Muzyka', 'lang'),
            'option'    => 'music',
            'category'  => 'music',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj tytuł', 'lang'),
              'info'  => __('Podaj wykonawcę', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub tytuł i wykonawcę.', 'buybox-widget')
            ]
          ],
          4 => [
            'label'     => __('Gry', 'lang'),
            'option'    => 'games',
            'category'  => 'game',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj tytuł', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          5 => [
            'label'     => __('Kosmetyki', 'lang'),
            'option'    => 'cosmetics',
            'category'  => 'cosmetics',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          6 => [
            'label'     => __('Elektronika', 'lang'),
            'option'    => 'electronics',
            'category'  => 'electronics',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          7 => [
            'label'     => __('Art. dziecięce', 'lang'),
            'option'    => 'children_goods',
            'category'  => 'children-good',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          8 => [
            'label'     => __('Odzież', 'lang'),
            'option'    => 'clothes',
            'category'  => 'clothes',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          9 => [
            'label'     => __('Sport', 'lang'),
            'option'    => 'sport',
            'category'  => 'sport',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          10 => [
            'label'     => __('Gry planszowe', 'lang'),
            'option'    => 'board_games',
            'category'  => 'board-game',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ],
          11 => [
            'label'     => __('Inne', 'lang'),
            'option'    => 'others',
            'category'  => 'others',
            'shortcode' => [
              'ean'   => __('Podaj numer EAN', 'lang'),
              'name'  => __('Podaj nazwę', 'lang'),
              'info'  => __('Podaj producenta', 'lang'),
              'error' => __('Podane dane są nieprawidłowe. Uzupełnij numer EAN lub nazwę i producenta.', 'buybox-widget')
            ]
          ]
        ];

        $list = $this->updateIds($list);

        return $list;

      }

      private function updateIds($list) {

        foreach ($list as $index => $category) {

          $saved = get_option('buybox_id_' . $category['option'], '');
          $list[$index]['category_id'] = $saved;

        }

        return $list;

      }

  }
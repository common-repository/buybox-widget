<?php

  if (!defined('WP_UNINSTALL_PLUGIN'))
    die;

  /* ---
    Remove options
  --- */

    delete_option('buybox_id_books');
    delete_option('buybox_id_movies');
    delete_option('buybox_id_music');
    delete_option('buybox_id_games');
    delete_option('buybox_id_cosmetics');
    delete_option('buybox_id_electronics');
    delete_option('buybox_id_children_goods');
    delete_option('buybox_id_clothes');
    delete_option('buybox_id_sport');
    delete_option('buybox_id_board_games');
    delete_option('buybox_id_others');

    delete_option('buybox_api_token');
    delete_option('buybox_api_error');

    delete_option('buybox_notice_hidden');

  /* ---
    Remove others
  --- */

    delete_transient('buybox_widget_notice');
    delete_option('buybox_skip_jquery');
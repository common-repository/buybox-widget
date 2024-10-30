<?php 

  /*
    Plugin Name: Widget BUY.BOX
    Plugin URI: http://pomoc.buybox.pl/articles/wtyczka-do-wordpressa-2-0/
    Description: Plugin pozwala zintegrować Twoją witrynę z komercyjną usługą BUY.BOX. Umożliwia dodawanie w prosty i szybki sposób widżetów BUY.BOX na stronie bloga.
    Version: 3.1.5
    Author: Simply4net
    Author URI: http://simply4net.pl/
  */

  define('BBW_VERSION',     '3.1.5');
  define('BBW_PATH',        plugin_dir_path(__FILE__));
  define('BBW_HTTP',        plugin_dir_url(__FILE__));
  define('BBW_PHP_MINIMAL', '5.4.0');
  define('BBW_NOTICE',      'buybox_notice_hidden');

  register_activation_hook(__FILE__, function() {

    if (version_compare(PHP_VERSION, BBW_PHP_MINIMAL, '>='))
      return;

    deactivate_plugins(basename(__FILE__));
    wp_die(sprintf(
      __('%sWidget BUY.BOX%s plugin requires a minimum PHP %s version. Sorry about that!', 'buybox-widget'),
      '<strong>',
      '</strong>',
      BBW_PHP_MINIMAL
    ));

  });

  require_once 'vendor/autoload.php';
  new BuyBoxWidget\BuyBoxWidget();
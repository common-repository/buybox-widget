<?php

  namespace BuyBoxWidget\Classic;

  class _Core {

    private $core;

    public function __construct($core) {

      $this->core      = $core;
      $this->editor    = new Editor();
      $this->shortcode = new Shortcode($core);

    }

  }
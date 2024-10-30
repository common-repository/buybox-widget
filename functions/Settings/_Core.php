<?php

  namespace BuyBoxWidget\Settings;

  class _Core {

    private $core;

    public function __construct($core) {

      $this->core  = $core;
      $this->cache = new Cache();
      $this->error = new Error();
      $this->page  = new Page($core);

    }

  }
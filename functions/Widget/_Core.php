<?php

  namespace BuyBoxWidget\Widget;

  class _Core {

    private $core;

    public function __construct($core) {

      $this->core  = $core;
      $this->embed = new Embed();

    }

  }
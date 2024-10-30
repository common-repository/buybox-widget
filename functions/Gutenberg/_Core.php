<?php

  namespace BuyBoxWidget\Gutenberg;

  class _Core {

    private $core;

    public function __construct($core) {

      $this->core   = $core;
      $this->assets = new Assets();
      $this->block  = new Block($core);
      $this->iframe = new Iframe($core);

    }

  }
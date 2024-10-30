<?php

  namespace BuyBoxWidget\Admin;

  class _Core {

    private $core;

    public function __construct($core) {

      $this->core   = $core;
      $this->assets = new Assets();
      $this->i18n   = new I18n();
      $this->notice = new Notice();

    }

  }
<?php

  namespace BuyBoxWidget;

  class BuyBoxWidget {

    public $config;

    public function __construct() {

      $this->admin     = new Admin\_Core($this);
      $this->classic   = new Classic\_Core($this);
      $this->gutenberg = new Gutenberg\_Core($this);
      $this->settings  = new Settings\_Core($this);
      $this->widget    = new Widget\_Core($this);

    }

  }
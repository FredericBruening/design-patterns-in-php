<?php

namespace SpecificationPattern;

class Customer {

    public $plan;

    public function __construct($plan)
    {
        $this->plan = $plan;
    }
}
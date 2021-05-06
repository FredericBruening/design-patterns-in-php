<?php

namespace TemplateMethodPattern;

class TurkeySub extends Sub {

    protected function addPrimaryToppings()
    {
        var_dump('add some turkey');

        return $this;
    }

}
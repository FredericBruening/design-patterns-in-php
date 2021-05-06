<?php

namespace AdapterPattern;

class Book implements BookInterface {

    public function open()
    {
        var_dump('Opening the book');
    }

    public function turnPage()
    {
        var_dump('Turning the page');
    }
}



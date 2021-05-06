<?php

require '../vendor/autoload.php';

use AdapterPattern\Book;
use AdapterPattern\BookInterface;
use AdapterPattern\Kindle;
use AdapterPattern\eReaderAdapter;

class Person {

    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new Book);
(new Person)->read(new eReaderAdapter(new Kindle));

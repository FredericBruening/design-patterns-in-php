<?php

//define a family of algorithms

class LogToFile implements Logger {

    public function log($data)
    {
        var_dump('log data to a file');
    }
}

class LogToDatabase implements Logger {

    public function log($data)
    {
        var_dump('log data to a database');
    }
}

class LogToXWebService implements Logger {

    public function log($data)
    {
        var_dump('log data to x web service');
    }
}

//encapsulate and make them interchangeable

interface Logger {

    public function log($data);
}

// use example

class App {

    public function log($data, Logger $logger)
    {
        $logger->log($data);
    }
}

$app = new App;

$app->log('some information here', new LogToDatabase);
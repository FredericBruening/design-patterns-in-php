<?php

// we can think about this a simple event system

interface Subject {
    public function attach($observable);
    public function detach($index);
    public function notify();
} // Publisher

interface Observer {
    public function handle();
} // Subscriber

class Login implements Subject {

    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            $this->attachObservers($observable);

            return $this;
        }

        $this->observers[] = $observable;

        return $this;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    public function attachObservers(array $observable): void
    {
        foreach ($observable as $observer) {
            if (!$observer instanceof Observer) {
                throw new Exception;
            }

            $this->attach($observer);
        }
    }

    public function fire()
    {
        // perform login

        $this->notify();
    }
}

class LogHandler implements Observer {

    public function handle()
    {
       var_dump('log something important');
    }
}

class EmailNotifier implements Observer {

    public function handle()
    {
        var_dump('fire off an email');
    }
}


class LoginReporter implements Observer {

    public function handle()
    {
        var_dump('report something');
    }
}

$login = new Login;
$login->attach(new LogHandler);
$login->attach(new EmailNotifier);
$login->attach(new LoginReporter);

$login->fire();

<?php

namespace App;

use App\Core\Observer\Observer;
use App\Core\Observer\Subject;

class Display implements Observer
{
    private $value = null;

    public function update(Subject $subject): void
    {
        /** @var Sensor $subject */
        $this->value = $subject->getValue();
        $this->display();
    }

    public function display(): void
    {
        echo is_null($this->value) ? 'Sensor value is not set' . PHP_EOL :
            'Sensor value: ' . $this->value . PHP_EOL;
    }
}

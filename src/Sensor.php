<?php

namespace App;

use App\Core\Observer\Observer;
use App\Core\Observer\Subject;

class Sensor implements Subject
{
    /**
     * @var \SplObjectStorage
     */
    private $observers;
    /**
     * @var float $value
     */
    private $value;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
        $this->notifyObservers();
    }

    public function registerObserver(Observer $o): void
    {
        $this->observers->attach($o);
    }

    public function removeObserver(Observer $o): void
    {
        $this->observers->detach($o);
    }

    public function notifyObservers(): void
    {
        /** @var Observer $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

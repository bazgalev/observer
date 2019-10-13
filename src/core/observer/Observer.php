<?php

namespace App\Core\Observer;

interface Observer
{
    public function update(Subject $subject): void;
}

<?php

namespace App;

class App
{
    public function run(): void
    {
        $displays = [];
        $displays[] = new Display();
        $displays[] = new Display();
        $displays[] = new Display();

        $sensor = new Sensor();

        /** @var Display $display */
        foreach ($displays as $display) {
            $display->display();
            $sensor->registerObserver($display);
        }

        $sensor->setValue(20.0);
        $sensor->setValue(22.0);

        $sensor->removeObserver($displays[1]);

        $sensor->setValue(25.0);

    }
}

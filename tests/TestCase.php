<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function dd(...$variables)
    {
        foreach ($variables as $variable) {
            print_r($variable);
            echo PHP_EOL;
        }

        die();
    }
}

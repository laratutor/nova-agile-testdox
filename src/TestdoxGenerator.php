<?php

namespace Laratutor\NovaAgileTestdox;

use PHPUnit\Framework\Test;
use PHPUnit\TextUI\Command;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Util\TestDox\NamePrettifier;

class TestdoxGenerator extends Command
{
    private $path;

    private $prettifier;

    private $tests = [];

    public function __construct($path)
    {
        $this->path = $path;
        $this->prettifier = new NamePrettifier();
    }

    private function getPath()
    {
        return $this->path;
    }

    public function generate()
    {
        $this->arguments['configuration'] = $this->getPath();

        $this->handleArguments([]);

        if ($this->arguments['test'] instanceof Test) {
            $suite = $this->arguments['test'];
        } else {
            $suite = $runner->getTest(
                $this->arguments['test'],
                $this->arguments['testFile'],
                $this->arguments['testSuffixes']
            );
        }

        return $this->listTests($suite);
    }

    private function listTests(TestSuite $suite)
    {
        $suiteIterator = $suite->getIterator();

        foreach ($suite->tests() as $suiteKey => $testSuite) {
            foreach (new \RecursiveIteratorIterator($testSuite->getIterator()) as $test) {
                if (!$test instanceof TestCase) {
                    continue;
                }

                $this->addTest($test, $suite->tests()[$suiteKey]->getName());
            }
        }


        return $this->tests;
    }

    private function addTest($test, $suite)
    {
        $classPath = \get_class($test);
        $prettifiedClass = $this->prettifier->prettifyTestClass($classPath);
        $prettifiedTestCase = $this->prettifier->prettifyTestCase($test);

        if (!isset($this->tests[$suite])) {
            $this->tests[$suite] = [];
        }

        $classBits = explode('\\', $prettifiedClass);
        $classNameOnly = end($classBits);

        if (!isset($this->tests[$suite][$classNameOnly])) {
            $this->tests[$suite][$classNameOnly] = [];
        }

        $this->tests[$suite][$classNameOnly][] = $prettifiedTestCase;
    }
}

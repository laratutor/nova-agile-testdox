<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\TextUI\Command;
use Laratutor\NovaAgileTestdox\TestdoxGenerator;

class TestdoxGeneratorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $path = getcwd() . "/tests/Fake";
        $this->generator = new TestdoxGenerator($path);
    }

    /** @test */
    public function testdox_generator_is_instance_of_textui_command()
    {
        $this->assertInstanceOf(Command::class, $this->generator);
    }

    /** @test */
    public function generate_will_return_nested_array_of_tests_keyed_by_suite_then_class()
    {
        $expected = [
            'Feature' => [
                'BobSkills' => [
                    'Bob can fly',
                    'bob can drive',
                ],
                'Joe skills test' => [
                    'Joe can walk',
                    'Joe can run',
                    'joe can swim',
                ]
            ],
            'Unit' => [
                'JonSkills' => [
                    'Can create non laravel objects',
                ],
            ],
        ];

        $this->assertSame($expected, $this->generator->generate());
    }
}

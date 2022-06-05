<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function test_format_date()
    {
        $date = now();
        $date->setYear(2012);
        $date->setMonth(2);
        $date->setDay(3);

        $result = format_date($date);

        $this->assertEquals('2012 წლის 3 მარტი', $result);
    }
}

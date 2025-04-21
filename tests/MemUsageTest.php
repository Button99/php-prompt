<?php

use PHPUnit\Framework\TestCase;

class MemUsageTest extends TestCase
{
    public function testMemoryUsage(): void {
        ob_start();
        $start = \Ckoumpis\PhpPrompt\MemoryUsage::getMemoryUsage();
        $arr = array_fill(0, 100000, 'test');
        $end = \Ckoumpis\PhpPrompt\MemoryUsage::getMemoryUsage();
        $memoryUsage = \Ckoumpis\PhpPrompt\MemoryUsage::showMemory($end - $start);
        echo $memoryUsage;
        $output = ob_get_clean();
        echo $output;
        $this->assertGreaterThan(0, $end - $start, 'Memory usage is =<0');
        $this->assertEquals(round(($end - $start) / 1024, 2) . '  MB', $memoryUsage, 'Error');
    }

    public function testPeakMemoryUsage(): void {
        ob_start();
        $start = \Ckoumpis\PhpPrompt\MemoryUsage::getPeakMemoryUsage();
        $arr = array_fill(0, 100000, 'test');
        $end = \Ckoumpis\PhpPrompt\MemoryUsage::getPeakMemoryUsage();
        $memoryUsage = \Ckoumpis\PhpPrompt\MemoryUsage::showMemory($end - $start);
        echo $memoryUsage;
        $output = ob_get_clean();
        echo $output;
        $this->assertIsString($memoryUsage, 'Memory Peak usage should be float!');
        $this->assertGreaterThan(0, $end - $start, 'Memory usage is =<0');
        $this->assertEquals(round(($end - $start) / 1024, 2) . '  MB', $memoryUsage, 'Error');

    }
}

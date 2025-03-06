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
        ob_end_clean();
        $this->assertGreaterThan(0, $end - $start, 'Memory usage is =<0');
        $this->assertIsString($memoryUsage, 'Memory usage is string!');
    }

    public function testPeakMemoryUsage(): void {
        ob_start();
        $start = \Ckoumpis\PhpPrompt\MemoryUsage::getPeakMemoryUsage();
        $arr = array_fill(0, 100000, 'test');
        $end = \Ckoumpis\PhpPrompt\MemoryUsage::getPeakMemoryUsage();
        $memoryUsage = \Ckoumpis\PhpPrompt\MemoryUsage::showMemory($end - $start);
        echo $memoryUsage;
        $content = ob_get_contents();
        echo $content;
        ob_end_clean();
        $this->assertIsString($memoryUsage, 'Memory Peak usage is float!');
    }
}

<?php

use Ckoumpis\PhpPrompt\ProgressBar;
use PHPUnit\Framework\TestCase;

class ProgressBarTest extends TestCase
{
    public function testDisplay()
    {
        ob_start();
        ProgressBar::display(5, 10);
        $output = ob_get_clean();
        // Verify the output contains the expected progress bar format
        $this->assertStringContainsString('[===============               ] 50%', $output);
    }
    
    public function testWithSteps() {
        ob_start();
        ProgressBar::withSteps(0, 10, 1);
        $output = ob_get_clean();
        echo $output . PHP_EOL;
        // Check for expected progress bar format
        $this->assertStringContainsString('[                              ] 0%', $output);
        $this->assertStringContainsString('[===                           ] 10%', $output);
        $this->assertStringContainsString('[======                        ] 20%', $output);
        $this->assertStringContainsString('[==============================] 100%', $output);
    
        ob_clean();
    }
    
    
    public function testHandleError()
    {
        ob_start();
        ProgressBar::handleError(new Exception('Test error'));
        $output = ob_get_clean();
        $this->assertStringContainsString('Error: Test error', $output);
    }
}

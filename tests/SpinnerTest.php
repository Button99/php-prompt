<?php

use Ckoumpis\PhpPrompt\Spinner;
use PHPUnit\Framework\TestCase;

class SpinnerTest extends TestCase
{
    public function testSpin()
    {
        ob_start();
        Spinner::withSteps();
        // usleep(50000); // Wait a bit to let the spinner spin
        Spinner::stop();
        $output = ob_get_clean();
        $this->assertStringContainsString('Complete', $output);
        ob_clean(); // Clean up the output buffer for the next test to run smoothly
    }

    public function testHandleError()
    {
        ob_start();
        $spinner = new Spinner();
        $spinner->handleError(new Exception('Test error'));
        $output = ob_get_clean();
        $this->assertStringContainsString('Error: Test error', $output);
        ob_clean();
    }
}

<?php


use Ckoumpis\PhpPrompt\ErrorHandler;
use PHPUnit\Framework\TestCase;

class ErrorHandlerTest extends TestCase
{

    public function test_ErrorHandler()
    {
        ob_start();

        try {
            throw new \RuntimeException('Test', 1);
        } catch (Exception $e) {
            ErrorHandler::handleError($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            $output = ob_get_clean();
        }
        $this->assertStringContainsString('[ERROR] Test in ' . __FILE__ . ' on line 15', $output);
    }
}
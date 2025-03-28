<?php


use Ckoumpis\PhpPrompt\Console;
use PHPUnit\Framework\TestCase;

class ConsoleTest extends TestCase
{

    public function testWarning()
    {
        ob_start();
        Console::warning('Testing warning!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[1;33", $output);
    }

    public function testCyan()
    {
        ob_start();
        Console::cyan('Testing Cyan!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;36", $output);

    }

    public function testLog()
    {
        ob_start();
        Console::log('Testing log!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[1;37", $output);
    }

    public function testError()
    {
        ob_start();
        Console::error('Testing error!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;31", $output);
    }

    public function testSuccess()
    {
        ob_start();
        Console::success('Testing success!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;32", $output);
    }

    public function testMagenta()
    {
        ob_start();
        Console::magenta('Testing magenta!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;35", $output);

    }

    public function testBlue()
    {
        ob_start();
        Console::blue('Testing blue!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;34", $output);
    }

    public function testDebug()
    {
        ob_start();
        Console::debug('Testing debug!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[38;5;235", $output);
    }

    public function testNotice()
    {
        ob_start();
        Console::notice('Testing notice!');
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;36", $output);
    }

    public function testTerm(): void {
        ob_start();
        Console::log('Testing log!')->term();
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;36", $output);
    }


}

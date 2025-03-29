<?php
namespace  Ckoumpis\PhpPrompt;

class Console {
    const COLORS = [
        'red' => '0;31',
        'green' => '0;32',
        'yellow' => '1;33',
        'blue' => '0;34',
        'magenta' => '0;35',
        'cyan' => '0;36',
        'white' => '1;37',
        'grey' => '38;5;235'
    ];

    public static function log(string $message, string $color = 'white'): self {
        $colorCode = self::COLORS[$color] ?? self::COLORS['white'];
        echo "\033[" . $colorCode . "m" . $message . "\033[0m" . PHP_EOL;
        return new self();
    }

    public static function error(string $message): self {
        self::log("Error: " . $message, 'red');
        return new self();
    }

    public static function success(string $message): self {
        self::log("Success: " . $message, 'green');
        return new self();
    }

    public static function warning(string $message): self {
        self::log("Warning: " . $message, 'yellow');
        return new self();
    }

    public static function debug(string $message): self {
        self::log("Debug: " . $message, 'grey');
        return new self();
    }

    public static function notice(string $message): self {
        self::log('Notice: '. $message, 'cyan');
        return new self();
    }


    public static function blue(string $message): self {
        self::log("Blue: " . $message, 'blue');
        return new self();
    }

    public static function magenta(string $message): self {
        self::log("Magenta: " . $message, 'magenta');
        return new self();
    }

    public static function cyan(string $message): self {
        self::log("Cyan: " . $message, 'cyan');
        return new self();
    }

    public function term(): void {
        die();
    }

    public function wait($seconds): void {
        sleep($seconds);
    }
    
    public function testSleep(): void {
        ob_start();
        Console::cyan('Testing notice!')->wait(2);
        $output = ob_get_clean();
        echo $output;
        $this->assertStringContainsString("\033[0;36", $output);
    }

}
?>

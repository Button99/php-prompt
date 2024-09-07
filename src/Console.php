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
        'white' => '1;37'
    ];

    public static function log(string $message, string $color = 'white'): void {
        $colorCode = self::COLORS[$color]?? self::COLORS['white'];
        echo "\033[" . $colorCode . "m" . $message . "\033[0m" . PHP_EOL;
    }

    public static function error(string $message): void {
        self::log("Error: " . $message, 'red');
    }

    public static function success(string $message): void {
        self::log("Success: " . $message, 'green');
    }

    public static function warning(string $message): void {
        self::log("Warning: " . $message, 'yellow');
    }

    public static function blue(string $message): void {
        self::log("Blue: " . $message, 'blue');
    }

    public static function magenta(string $message): void {
        self::log("Magenta: " . $message, 'magenta');
    }

    public static function cyan(string $message): void {
        self::log("Cyan: " . $message, 'cyan');
    }
}
?>
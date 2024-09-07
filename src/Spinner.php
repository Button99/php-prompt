<?php

namespace Ckoumpis\PhpPrompt;

class Spinner {
    private static $frames = ['-', '\\', '|', '/'];
    private static $currentFrame = 0;
    private static $isRunning = false;

    public static function withSteps(int $start = 0, int $steps = 10, int $sleep =1 ): void {
        try {
            for($i = $start; $i < $steps; $i++) {
                self::spin();
                sleep($sleep);
            }    
        } catch(\Throwable $e) {
            self::handleError($e);
        }
    }

    public static function spin(string $message = '', int $delay = 5000): void {
        echo "\r" . self::$frames[self::$currentFrame % count(self::$frames)]. " $message";
        self::$currentFrame++;
        usleep($delay);
    }

    public static function stop(string $message = 'Complete'): void {
        self::$isRunning = false;
        echo "\r✔ " . $message . PHP_EOL;
    }

    public static function handleError(\Throwable $e): void {
        self::stop('Error: ' . $e->getMessage());
    }
}
?>
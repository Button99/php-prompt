<?php

namespace Ckoumpis\PhpPrompt;

class ProgressBar {
    public static function withSteps(int $start=0, int $total = 10, int $sleep = 500): void {
        if($total <= 0) {
            throw new \Exception("Total steps must be greater than 0.");
        }
        try {
            for($i = $start; $i <= $total; $i++) {
                self::display($i, $total);
                usleep($sleep);
            }
        } catch(\Throwable $e) {
            self::handleError($e);
        }
    }

    public static function display(int $done, int $total, int $barLength = 30): void {
        $progress = ($done / $total);
        $block = round($barLength * $progress);
        $bar = str_repeat("=", $block) . str_repeat(" ", $barLength - $block);
        
        $status = number_format($progress * 100, 0);
        echo "\r[$bar] $status%";
        if($done >= $total) {
            echo PHP_EOL;
        }
    }

    public static function handleError(\Throwable $e): void {
        echo PHP_EOL . 'Error: ' . $e->getMessage() . PHP_EOL;
    }
}

?>
<?php

namespace Ckoumpis\PhpPrompt;

class ErrorHandler {
    public static function handleError(mixed $errno, string $errstr, string $errfile, int $errline): void {
        $errorType= [
            E_ERROR => "ERROR",
            E_WARNING => "WARNING",
            E_PARSE => "PARSE ERROR",
            E_NOTICE => "NOTICE",
        ];

        $type = $errorType[$errno] ?? "UNKNOWN";
        echo PHP_EOL . "[{$type}] {$errstr} in {$errfile} on line {$errline} ". PHP_EOL;
    }
}

?>
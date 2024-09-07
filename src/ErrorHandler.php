<?php

class ErrorHandler {
    public static function handleError($errno, $errstr, $errfile, $errline): void {
        $errorType= [
            E_ERROR => "ERROR",
            E_WARNING => "WARNING",
            E_PARSE => "PARSE ERROR",
            E_NOTICE => "NOTICE",
        ];

        $type = isset($errorType[$errno]) ? $errorType[$errno] : "UNKNOWN";
        echo PHP_EOL . "[{$type}] {$errstr} in {$errfile} on line {$errline} ". PHP_EOL;
    }
}

?>
<?php

namespace Ckoumpis\PhpPrompt;

class MemoryUsage
{

    const BYTES_MB = 1024;
    const BYTES_KB = 1048576;

    public static function getMemoryUsage(): float
    {
        return memory_get_usage();
    }

    public static function getPeakMemoryUsage(): float
    {
        return memory_get_peak_usage();
    }

    public static function showMemory(int $bytes): string
    {
        if ($bytes >= self::BYTES_MB) {
            return self::formatMemory($bytes, self::BYTES_MB, ' MB');
        } elseif ($bytes >= self::BYTES_KB) {
            return self::formatMemory($bytes, self::BYTES_KB, ' KB');
        } else {
            return $bytes . " Bytes";
        }
    }

    protected static function formatMemory(int $bytes, int $unitSize, string $unit): string
    {
        return round($bytes / $unitSize, 2) . ' ' . $unit;
    }
}

<?php

namespace App\Service;


abstract class WowTimer
{
    public const EU_START = 0;
    public const TIME_INTERVAL = 0;
    public const DURATION_INVASION = 0;

    public function getCurrentTimer()
    {
        $now = time();
        $progress = ($now - static::EU_START) % static::TIME_INTERVAL;
        return $progress;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: isak
 * Date: 1/29/18
 * Time: 12:45 PM
 */

namespace App\Service;


class InvasionTimer
{
    const EU_START = 1491775200;
    const TIME_INTERVAL = 66600; // Every 18.5 hours
    const DURATION_INVASION = 21600; // 6 hours

    public function getCurrentInvasionTimer()
    {
        $now = time();
        $progress = ($now - self::EU_START) % self::TIME_INTERVAL;
        return $progress;
    }
}
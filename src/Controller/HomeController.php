<?php
/**
 * Created by PhpStorm.
 * User: isak
 * Date: 1/29/18
 * Time: 12:34 PM
 */

namespace App\Controller;


use App\Service\InvasionTimer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function __invoke(InvasionTimer $invasionTimer)
    {
        $progress = $invasionTimer->getCurrentInvasionTimer();
        if ($progress < InvasionTimer::DURATION_INVASION) {
            $invasionOnFor = InvasionTimer::DURATION_INVASION - $progress;
            $message = 'Invasion is in progress for another ' . gmdate('H \h\o\u\r\s i \m\i\n\u\t\e\s \a\n\d s \s\e\c\o\n\d\s', $invasionOnFor);
        } else {
            $nextInvasionIn = InvasionTimer::TIME_INTERVAL - $progress;
            $message = 'Next invasion in ' . gmdate('H \h\o\u\r\s i \m\i\n\u\t\e\s \a\n\d s \s\e\c\o\n\d\s', $nextInvasionIn);
        }
        return $this->render('invasion.html.twig', [
            'message' => $message,
            'textInvasionIsOn' => 'Invasion is in progress for another %hours% hours %minutes% minutes and %seconds% seconds',
            'textNextInvasion' => 'Next invasion in %hours% hours %minutes% minutes and %seconds% seconds',
            'timestampDefault' => InvasionTimer::EU_START,
            'timeInterval' => InvasionTimer::TIME_INTERVAL,
            'durationInvasion' => InvasionTimer::DURATION_INVASION
        ]);
    }
}
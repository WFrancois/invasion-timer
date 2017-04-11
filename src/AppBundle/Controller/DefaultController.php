<?php

namespace AppBundle\Controller;

use AppBundle\InvasionTimer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var InvasionTimer $InvasionTimer */
        $InvasionTimer = $this->get('app.invasion');

        $progress = $InvasionTimer->getCurrentInvasionTimer();

        if($progress < InvasionTimer::DURATION_INVASION) {
            $invasionOnFor = InvasionTimer::DURATION_INVASION - $progress;

            $message = 'Invasion is in progress for another ' . gmdate('H \h\o\u\r\s i \m\i\n\u\t\e\s \a\n\d s \s\e\c\o\n\d\s', $invasionOnFor);
        } else {
            $nextInvasionIn = InvasionTimer::TIME_INTERVAL - $progress;
            $message = 'Next invasion in ' . gmdate('H \h\o\u\r\s i \m\i\n\u\t\e\s \a\n\d s \s\e\c\o\n\d\s', $nextInvasionIn);
        }
        return $this->render('index.html.twig', [
            'message' => $message,
            'textInvasionIsOn' => 'Invasion is in progress for another %hours% hours %minutes minutes and %seconds% seconds',
            'textNextInvasion' => 'Next invasion in %hours% hours %minutes minutes and %seconds% seconds',
            'timestampDefault' => InvasionTimer::EU_START,
            'timeInterval' => InvasionTImer::TIME_INTERVAL,
        ]);
    }
}
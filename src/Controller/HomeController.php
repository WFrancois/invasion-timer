<?php
/**
 * Created by PhpStorm.
 * User: isak
 * Date: 1/29/18
 * Time: 12:34 PM
 */

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function __invoke()
    {
        return new Response(
            '<html><body></body></html>'
        );
    }
}
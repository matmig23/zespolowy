<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsController extends Controller
{
    /**
     * @Route("/Statistics/index", name="statistics")
     */
    public function statisticsAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Statistics/index.html.twig');
    }
}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TimetableController extends Controller
{
    /**
     * @Route("/Timetable/index", name="kalendarz")
     */
    public function timetableAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Timetable/index.html.twig');
    }
}

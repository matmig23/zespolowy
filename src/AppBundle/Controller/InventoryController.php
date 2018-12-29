<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends Controller
{
    /**
     * @Route("/Inventory/index", name="inventory_list")
     */
    public function inventoryAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Inventory/index.html.twig');
    }
}

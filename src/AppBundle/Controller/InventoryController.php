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
    public function listAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Inventory/index.html.twig');
    }

    /**
     * @Route("/Inventory/edit", name="inventory_edit")
     */
    public function editAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Inventory/edit.html.twig');
    }

    /**
     * @Route("/Inventory/details", name="inventory_details")
     */
    public function detailsAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Inventory/details.html.twig');
    }

    /**
     * @Route("/Inventory/index", name="inventory_delete")
     */
    public function deleteAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Inventory/index.html.twig');
    }
}

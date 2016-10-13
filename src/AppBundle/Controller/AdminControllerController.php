<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminControllerController extends Controller
{
      /**
       * @Route("/", name="admin")
       */
      public function indexAction(Request $request)
      {
          return $this->render('admin/index.html.twig', [
          ]);
      }
}

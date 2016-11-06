<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends BaseController
{
    /**
     * @Route("/api")
     */
    public function indexAction()
    {
        $view = $this->view(['version' => '1.0', 'status' => 'Working'], Response::HTTP_OK);
        return $this->handleView($view);
    }

    /**
     * @Route("/api/version")
     */
    public function versionAction()
    {
        $view = $this->view(['version' => '1.0'], Response::HTTP_OK);
        return $this->handleView($view);
    }
}

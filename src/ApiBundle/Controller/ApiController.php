<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /**
     * @Route("/api")
     */
    public function indexAction()
    {
        return new JsonResponse(array('version' => '1.0', 'status' => 'Working'), 200);
    }
    /**
     * @Route("/api/version")
     */
    public function versionAction()
    {
        return new JsonResponse(array('version' => '1.0'), 200);
    }
}

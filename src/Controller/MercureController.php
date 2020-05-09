<?php

namespace App\Controller;

use App\Services\MercureCookieGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\WebLink\Link;

class MercureController extends AbstractController
{
    /**
     * @Route("/discover", name="discover")
     * @param Request $request
     * @param MercureCookieGenerator $cookieGenerator
     * @return JsonResponse
     */
    public function Discover(Request $request, MercureCookieGenerator $cookieGenerator)
    {
        $hubUrl = $this->getParameter('mercure.default_hub');
        $this->addLink($request, new Link('mercure',$hubUrl));

        $response = $this->json('done');
        $response->headers->setCookie($cookieGenerator->generate($this->getUser()));

        return $response;


    }

}

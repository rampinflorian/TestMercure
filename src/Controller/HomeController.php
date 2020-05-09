<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/push", name="push")
     * @param PublisherInterface $publisher
     * @return Response
     */
    public function PushAction(PublisherInterface $publisher)
    {
        $target = ["/user/2"];

        $update = new Update(
            '/ping',
            json_encode(['message' => 'coucou']),
            $target
        );

        $publisher($update);

        return $this->render('home/index.html.twig', [
        ]);
    }
}

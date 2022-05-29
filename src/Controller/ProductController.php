<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @param MessageGenerator $messageGenerator
     * @return Response
     * @Route("/products/new")
     */
    public function new(MessageGenerator $messageGenerator)
    {
        $message = $messageGenerator->getHappyMessage();
        return new Response('The random message: '. $message);
    }

    /**
     * @Route("/product", name="app_product")
     */
    public function index(LoggerInterface $logger): Response
    {
        $logger->info('Look, I just used a service!');

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}

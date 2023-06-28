<?php

namespace App\Controller;

use App\Repository\TestimonialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /*public function index(): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }*/
    #[Route('/', name: 'app_home')]
    public function index (TestimonialRepository $testimonialRepository): Response
    {
        return $this->render('home/home.html.twig',[
        'testimonial' => $testimonialRepository->findBy([],[])
        ]);
    }
}

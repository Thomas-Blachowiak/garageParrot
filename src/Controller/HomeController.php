<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use App\Repository\TestimonialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index (TestimonialRepository $testimonialRepository, ServicesRepository $servicesRepository): Response
    {
        return $this->render('home/home.html.twig',[
        'testimonial' => $testimonialRepository->findBy([],[]),
        'services' => $servicesRepository->findBy([],[])
        ]);
    }


}

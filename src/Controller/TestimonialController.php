<?php

namespace App\Controller;

use App\Entity\Testimonial;
use App\Form\TestimonialFormType;
use App\Repository\TestimonialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class TestimonialController extends AbstractController
{
    private $entityManager;
    private $testimonialRepository;

    public function __construct(EntityManagerInterface $entityManager, TestimonialRepository $testimonialRepository)
    {
        $this->entityManager = $entityManager;
        $this->testimonialRepository = $testimonialRepository;
    }
    #[Route('/testimonial', name: 'app_testimonial', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $testimonial = new Testimonial();
        $testimonial->setApproved(false);

        $form = $this->createForm(TestimonialFormType::class, $testimonial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($testimonial);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_testimonial_success');
        }

        return $this->render('testimonial/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/testimonial/success', name: 'app_testimonial_success', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('testimonial/success.html.twig');
    }
    // A partir de la j'ai changé le code

    #[Route('/admin', name: 'admin_testimonials')]
    public function adminTestimonials(): Response
    {
        $testimonials = $this->testimonialRepository->findAll();

        return $this->render('testimonial/admin_testimonials.html.twig', [
            'testimonials' => $testimonials,
        ]);
    }

    #[Route('/admin/testimonial/approve/{id}', name: 'admin_testimonial_approve')]
    public function approveTestimonial(Testimonial $testimonial): Response
    {
        $testimonial->setApproved(true);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_testimonials');
    }

    #[Route('/admin/testimonial/disapprove/{id}', name: 'admin_testimonial_disapprove')]
    public function disapproveTestimonial(Testimonial $testimonial): Response
    {
        $testimonial->setApproved(false);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_testimonials');
    }
}
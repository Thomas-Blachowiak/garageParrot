<?php

namespace App\Controller\Admin;

use App\Entity\UsedCar;
use App\Entity\User;
use App\Entity\Testimonial;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }
    #[IsGranted('ROLE_USER')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(UsedCarCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GarageParrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');

        yield MenuItem::subMenu('Annonce', 'fas fa-car')->setSubItems([
            MenuItem::linkToCrud('Créer une nouvelle annonce', 'fas fa-car', UsedCar::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçue des annonces', 'fas fa-eye', UsedCar::class)
        ]);

        yield MenuItem::subMenu('Témoignage', 'fas fa-comment')->setSubItems([
            MenuItem::linkToCrud('Créer un nouveau témoignage', 'fas fa-comment', Testimonial::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçue des témoignage', 'fas fa-eye', Testimonial::class)
        ]);

        yield MenuItem::subMenu('Demande client', 'fas fa-comment')->setSubItems([
            MenuItem::linkToCrud('Aperçue des témoignage', 'fas fa-eye', Contact::class)
        ]);

        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Utilisateur', 'fas fa-user')->setSubItems([
                MenuItem::linkToCrud('Créer un utilisateur', 'fas fa-user-friends', User::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des utilisateurs', 'fas fa-eye', User::class)
            ]);
        }
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\UsedCar;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsedCarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UsedCar::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }
    public function configureFields(string $pageName): iterable
    {
        yield    TextField::new('name', 'Nom du véhicule');
        yield    IntegerField::new('price', 'Prix');
        yield    IntegerField::new('year', 'Première immatriculation');
        yield    IntegerField::new('kilometer', 'Nombre de km');
        yield    ChoiceField::new('energy', 'Energie')
                    ->setChoices([
                        'Essence' => 'Essence',
                        'Diesel' => 'Diesel',
                        'Hybrid' => 'Hybrid',
                        'Electrique' => 'Electrique'
                    ]);
        yield    TextareaField::new('caracteristics', 'Caractéristiques');
        yield    ImageField::new('image')
                    ->setBasePath('uploads/images')
                    ->setUploadDir('public/uploads/images')
                    ->setSortable(true);
    }

    /*public function configureCrud(Crud $crud): Crud
    {
        return $d
            ->setEntityLabelInSingular('Véhicule d\'occasion')
            ->setEntityLabelInPlural('Véhicules d\'occasion');
    }*/
}

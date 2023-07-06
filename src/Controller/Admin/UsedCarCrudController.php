<?php

namespace App\Controller\Admin;

use App\Entity\UsedCar;
use App\Form\Type\UsedCarImageType;
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
use App\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\VichImageField;
use Symfony\Component\Form\Extension\Core\Type\FileType;

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
        yield    IntegerField::new('year', 'Année');
        yield    IntegerField::new('kilometer', 'Nombre de km');
        yield    ChoiceField::new('energy', 'Energie')
                    ->setChoices([
                        'Essence' => 'Essence',
                        'Diesel' => 'Diesel',
                        'Hybrid' => 'Hybrid',
                        'Electrique' => 'Electrique'
                    ]);
        yield    TextareaField::new('caracteristics', 'Caractéristiques');
        
        yield   CollectionField::new('images')
                ->setEntryType(UsedCarImageType::class);
        
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInSingular('un nouveau véhicule d\'occasion')
        ->setPageTitle('index', 'Voitures d\'occasion')
        ->setPaginatorPageSize(5);
    }

}
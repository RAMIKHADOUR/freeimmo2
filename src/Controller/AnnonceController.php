<?php

namespace App\Controller;


use App\Entity\Type;
use App\Form\TypesType;
use App\Entity\Annonces;
use App\Entity\Property;
use App\Entity\Categorys;
use App\Form\AnnoncesType;
use App\Form\PropertyType;
use App\Form\CategorysType;
use App\Entity\Localisation;
use App\Entity\Installations;
use App\Form\LocalisationType;
use App\Form\InstallationsType;
use App\Repository\AnnoncesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'app_annonce',methods:['GET','POST'])]
    public function index(
    AnnoncesRepository $repository): Response
    {
       

        return $this->render('annonce/index.html.twig', [
            'annonce' => $repository->findAll(),
            'category' => $repository->findAll(),
            'type'=>$repository->findAll(),
            'property'=>$repository->findAll(),
            'installation'=>$repository->findAll(),
            'localisation'=>$repository->findAll()
        ]);
    }

    #[Route('/annonce/new',name:'app_newannonce' , methods:['GET','POST'])]
    public function new():Response
    {
        $annonce = new Annonces();
        $category = new Categorys();
        $type = new Type();
        $property = new Property();
        $installation = new Installations();
        $localisation = new Localisation();

        $form=$this->createForm(AnnoncesType::class,$annonce);
        $form=$this->createForm(CategorysType::class,$category);
        $form=$this->createForm(InstallationsType::class,$installation);
        $form=$this->createForm(TypesType::class,$type);
        $form=$this->createForm(PropertyType::class,$property);
        $form=$this->createForm(LocalisationType::class,$localisation);
      
        return $this->render('annonce/new.html.twig',[
            'form'=>$form->createView()
        ]);

    }
}

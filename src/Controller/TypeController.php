<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Entity\Type;
use App\Repository\AlimentRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    /**
     * @Route("/types", name="types")
     */
    public function index(TypeRepository $repository)
    {
        $types = $repository->findAll();
        return $this->render('type/types.html.twig', [
            "types" => $types
        ]);
    }

     /**
     * @Route("/aliment/{id}", name="afficher_list_aliment_types")
     */
    public function afficherListeAlimentParType(TypeRepository $repository,AlimentRepository $repo, Type $listType, Aliment $aliment)
    {
        $types = $repository->findAll();
        $test = $repo->findAll();
        return $this->render('aliment/alimentType.html.twig', [
            "types" => $types,
            "list" => $types,
            "aliments" => $test,
            
        ]);
    }
}

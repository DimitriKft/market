<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Entity\Type;
use App\Repository\AlimentRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
    */
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie'=> false,
            "isGlucide"=> false
        ]);
    }

    /**
     * @Route("/aliments/calorie/{calorie}", name="alimentsParCalorie")
     */
    public function alimentsMoinsCaloriques(AlimentRepository $repository, $calorie)
    {
        $aliments = $repository->getAlimentParPropriete('calorie', '<', $calorie);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie"=> true,
            "isGlucide"=> false
        ]);
    }

    /**
     * @Route("/aliments/glucide/{glucide}", name="alimentsParGlucides")
     */
    public function alimentsMoinsGlucides(AlimentRepository $repository, $glucide)
    {
        $aliments = $repository->getAlimentParPropriete('glucide', '<', $glucide);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie"=> false,
            "isGlucide"=> true
        ]);
    }

    /**
     * @Route("/aliments/type/{id}", name="alimentParType")
     */
    public function alimentParType(AlimentRepository $repository, Aliment $type)
    {
        $aliments = $repository->findAll();

        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "type" => $type
        ]);
    }
}

<?php

namespace App\Controller;

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
            'isCalorie'=> false
        ]);
    }

      /**
     * @Route("/aliments/{calorie}", name="alimentsParCalorie")
     */
    public function alimentsMoinsCaloriques(AlimentRepository $repository, $calorie)
    {
        $aliments = $repository->getAlimentParNbCalories($calorie);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie"=> true
        ]);
    }
}

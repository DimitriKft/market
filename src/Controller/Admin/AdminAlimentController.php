<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig', [
            "aliments" => $aliments
        ]);
    }

    /**
     * @Route("/admin/aliment/creation", name="admin_aliment_creation")
     * @Route("/admin/aliment/{id}", name="admin_aliment_modification", methods="GET|POST")
     */
    public function ajoutEtModif(Aliment $aliment = null, Request $request, EntityManagerInterface $entityMananger)
    {
        if(!$aliment)
        {
            $aliment = new Aliment();
        }
        $form = $this->createForm(AlimentType::class, $aliment);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $modif = $aliment->getId() !== null;
            $entityMananger->persist($aliment);
            $entityMananger->flush();
            $this->addFlash("success", ($modif) ? "la modification a été effectuée" : "L'ajout a été effectuée");
            return $this->redirectToRoute('admin_aliment');
        }
     
        return $this->render('admin/admin_aliment/modifEtAjout.html.twig', [
            "aliment" => $aliment,
            "form"    => $form->createView(),
            "isModification" => $aliment->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/aliment/{id}", name="admin_aliment_suppression", methods="delete")
     */
    public function suppression(Aliment $aliment, Request $request, EntityManagerInterface $entityMananger )
    {
        if($this->isCsrfTokenValid("SUP". $aliment->getId(),$request->get('_token')))
        {
            $entityMananger->remove($aliment);
            $entityMananger->flush();
            $this->addFlash("success", "la suppression a été effectuée");
            return $this->redirectToRoute('admin_aliment');
        }
    }

  

}

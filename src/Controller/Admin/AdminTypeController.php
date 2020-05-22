<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminTypeController extends AbstractController
{
    /**
     * @Route("/admin/type", name="admin_types")
     */
    public function index(TypeRepository $repository)
    {
        $types = $repository->findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            "types" => $types
        ]);
    }

    /**
     * @Route("/admin/type/create", name="ajoutType")
     * @Route("/admin/type/{id}", name="modifType", methods="POST|GET")
     */
    public function ajoutEtModif(Type $type = null, Request $request, EntityManagerInterface $entitymanager)
    {
        if(!$type)
        {
            $type = new Type();
        }
        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $modif = $type->getId() !== null;
            $entitymanager->persist($type);
            $entitymanager->flush();
            $this->addFlash("success", ($modif) ? "la modification a été effectuée" : "L'ajout a été effectuée");
            return $this->redirectToRoute('admin_types');
        }

        return $this->render('admin/admin_type/ajoutEtModif.html.twig', [
            "type" => $type,
            "form" => $form->createView()
        ]);
    }

     /**
     * @Route("/admin/type/{id}", name="supType", methods="delete")
     */
    public function suppression(Type $type, EntityManagerInterface $entitymanager, Request $request)
    {
        if($this->isCsrfTokenValid('SUP'.$type->getId(), $request->get('_token')))
        {
            $entitymanager->remove($type);
            $entitymanager->flush();
            $this->addFlash("success", "la suppression a été effectuée");
            return $this->redirectToRoute('admin_types');
        }
    }
}

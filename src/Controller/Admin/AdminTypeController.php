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
     * @Route("/admin/type/{id}", name="modifType")
     */
    public function ajoutEtModif(Type $type, Request $request, EntityManagerInterface $entitymanager)
    {
        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entitymanager->persist($type);
            $entitymanager->flush();
            return $this->redirectToRoute('admin_types');
        }

        return $this->render('admin/admin_type/ajoutEtModif.html.twig', [
            "type" => $type,
            "form" => $form->createView()
        ]);
    }
}

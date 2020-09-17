<?php

namespace App\Controller;

use App\Entity\RentEquipments;
use App\Form\RentEquipmentsType;
use App\Repository\RentEquipmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rent/equipments")
 */
class RentEquipmentsController extends AbstractController
{
    /**
     * @Route("/", name="rent_equipments_index", methods={"GET"})
     */
    public function index(RentEquipmentsRepository $rentEquipmentsRepository): Response
    {
        return $this->render('rent_equipments/index.html.twig', [
            'rent_equipments' => $rentEquipmentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rent_equipments_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rentEquipment = new RentEquipments();
        $form = $this->createForm(RentEquipmentsType::class, $rentEquipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rentEquipment);
            $entityManager->flush();

            return $this->redirectToRoute('rent_equipments_index');
        }

        return $this->render('rent_equipments/new.html.twig', [
            'rent_equipment' => $rentEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rent_equipments_show", methods={"GET"})
     */
    public function show(RentEquipments $rentEquipment): Response
    {
        return $this->render('rent_equipments/show.html.twig', [
            'rent_equipment' => $rentEquipment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rent_equipments_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RentEquipments $rentEquipment): Response
    {
        $form = $this->createForm(RentEquipmentsType::class, $rentEquipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rent_equipments_index');
        }

        return $this->render('rent_equipments/edit.html.twig', [
            'rent_equipment' => $rentEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rent_equipments_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RentEquipments $rentEquipment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rentEquipment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rentEquipment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rent_equipments_index');
    }
}

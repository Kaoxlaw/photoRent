<?php

namespace App\Controller;

use App\Entity\SellEquipments;
use App\Form\SellEquipmentsType;
use App\Repository\SellEquipmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sell/equipments")
 */
class SellEquipmentsController extends AbstractController
{
    /**
     * @Route("/", name="sell_equipments_index", methods={"GET"})
     */
    public function index(SellEquipmentsRepository $sellEquipmentsRepository): Response
    {
        return $this->render('sell_equipments/index.html.twig', [
            'sell_equipments' => $sellEquipmentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sell_equipments_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sellEquipment = new SellEquipments();
        $form = $this->createForm(SellEquipmentsType::class, $sellEquipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sellEquipment);
            $entityManager->flush();

            return $this->redirectToRoute('sell_equipments_index');
        }

        return $this->render('sell_equipments/new.html.twig', [
            'sell_equipment' => $sellEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sell_equipments_show", methods={"GET"})
     */
    public function show(SellEquipments $sellEquipment): Response
    {
        return $this->render('sell_equipments/show.html.twig', [
            'sell_equipment' => $sellEquipment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sell_equipments_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SellEquipments $sellEquipment): Response
    {
        $form = $this->createForm(SellEquipmentsType::class, $sellEquipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sell_equipments_index');
        }

        return $this->render('sell_equipments/edit.html.twig', [
            'sell_equipment' => $sellEquipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sell_equipments_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SellEquipments $sellEquipment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sellEquipment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sellEquipment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sell_equipments_index');
    }
}

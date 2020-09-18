<?php

namespace App\Controller;

use App\Entity\MakeItRent;
use App\Form\MakeItRentType;
use App\Repository\MakeItRentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/make/it/rent")
 */
class MakeItRentController extends AbstractController
{
    /**
     * @Route("/", name="make_it_rent_index", methods={"GET"})
     */
    public function index(MakeItRentRepository $makeItRentRepository): Response
    {
        return $this->render('make_it_rent/index.html.twig', [
            'make_it_rents' => $makeItRentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="make_it_rent_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $makeItRent = new MakeItRent();
        $form = $this->createForm(MakeItRentType::class, $makeItRent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($makeItRent);
            $entityManager->flush();

            return $this->redirectToRoute('make_it_rent_index');
        }

        return $this->render('make_it_rent/new.html.twig', [
            'make_it_rent' => $makeItRent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="make_it_rent_show", methods={"GET"})
     */
    public function show(MakeItRent $makeItRent): Response
    {
        return $this->render('make_it_rent/show.html.twig', [
            'make_it_rent' => $makeItRent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="make_it_rent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MakeItRent $makeItRent): Response
    {
        $form = $this->createForm(MakeItRentType::class, $makeItRent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('make_it_rent_index');
        }

        return $this->render('make_it_rent/edit.html.twig', [
            'make_it_rent' => $makeItRent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="make_it_rent_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MakeItRent $makeItRent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$makeItRent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($makeItRent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('make_it_rent_index');
    }
}

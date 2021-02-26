<?php

namespace App\Controller;

use App\Entity\Dispositivo;
use App\Form\DispositivoType;
use App\Repository\DispositivoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dispositivo")
 */
class DispositivoController extends AbstractController
{
    /**
     * @Route("/", name="dispositivo_index", methods={"GET"})
     */
    public function index(DispositivoRepository $dispositivoRepository): Response
    {
        return $this->render('dispositivo/index.html.twig', [
            'dispositivos' => $dispositivoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dispositivo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dispositivo = new Dispositivo();
        $form = $this->createForm(DispositivoType::class, $dispositivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dispositivo);
            $entityManager->flush();

            return $this->redirectToRoute('dispositivo_index');
        }

        return $this->render('dispositivo/new.html.twig', [
            'dispositivo' => $dispositivo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dispositivo_show", methods={"GET"})
     */
    public function show(Dispositivo $dispositivo): Response
    {
        return $this->render('dispositivo/show.html.twig', [
            'dispositivo' => $dispositivo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dispositivo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dispositivo $dispositivo): Response
    {
        $form = $this->createForm(DispositivoType::class, $dispositivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dispositivo_index');
        }

        return $this->render('dispositivo/edit.html.twig', [
            'dispositivo' => $dispositivo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dispositivo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dispositivo $dispositivo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dispositivo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dispositivo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dispositivo_index');
    }
}

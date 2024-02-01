<?php

namespace App\Controller;

use App\Entity\Session;
use App\Form\SessionType;
use App\Repository\SessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Session')]
class SessionController extends AbstractController
{
    #[Route('/new', name: 'app_session')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $session = new Session();

        // Create the form, linked with $session
        $form = $this->createForm(SessionType::class, $session);

        // Get data from HTTP request
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager->persist($session);
            $entityManager->flush();

            $this->addFlash('success', 'Ta session a bien été enregistrée!');

        // Redirect to session list
            return $this->redirectToRoute('app_session_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('session/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/show/{id<^[0-9]+$>}', name: 'app_session_show')]
    public function show(int $id, SessionRepository $sessionRepository): Response
    {
        $session = $sessionRepository->findOneBy(['id' => $id]);

        if (!$session) {
            throw $this->createNotFoundException(
                'Auncune session : ' . $id . ' trouvé dans la table session.'
            );
        }

        return $this->render('session/show.html.twig', [
        'session' => $session,
        ]);
    }
}

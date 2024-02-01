<?php

namespace App\Controller;

use App\Entity\Session;
use App\Form\SessionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(): Response
    {
        $session = new Session();

        // Create the form, linked with $session
        $form = $this->createForm(SessionType::class, $session);

        return $this->render('session/index.html.twig', [
            'form' => $form,
        ]);
    }
}

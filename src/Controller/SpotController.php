<?php

namespace App\Controller;

use App\Entity\Spot;
use App\Repository\SpotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Spot')]
class SpotController extends AbstractController
{
    #[Route('/', name: 'app_spot')]
    public function index(SpotRepository $spotRepository): Response
    {
        $spots = $spotRepository->findAll();

        return $this->render('spot/index.html.twig', [
            'spots' => $spots,
        ]);
    }

    #[Route('/show/{id<^[0-9]+$>}', name: 'app_spot_show')]
    public function show(int $id, SpotRepository $spotRepository): Response
    {
        $spot = $spotRepository->findOneBy(['id' => $id]);

        if (!$spot) {
            throw $this->createNotFoundException(
                'Auncun spot : ' . $id . ' trouvé dans la table spot.'
            );
        }
        return $this->render('spot/show.html.twig', [
        'spot' => $spot,
        ]);
    }
}

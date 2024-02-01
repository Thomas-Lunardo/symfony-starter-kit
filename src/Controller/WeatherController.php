<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather', name: 'app_weather')]
    public function index(CallApiService $callApiService): Response
    {
        // dd($callApiService->getWeatherData());
        return $this->render('weather/index.html.twig', [
            'data' => $callApiService->getWeatherData(),
        ]);
    }
}

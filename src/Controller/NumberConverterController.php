<?php

namespace App\Controller;

use App\Requests\NumberConverterRequest;
use Salarmehr\Cosmopolitan\Cosmo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NumberConverterController extends AbstractController
{
    #[Route('/number_converter', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $words = ['sky', 'cloud', 'wood', 'rock', 'forest',
            'mountain', 'breeze'];

        return $this->render('home/index.html.twig', [
            'words' => $words
        ]);
    }

    #[Route('/number_converter', methods: ['POST'])]
    public function convert(NumberConverterRequest $request): Response
    {
        return new JsonResponse(['spellout' => Cosmo::create($request->language)->spellout(intval($request->number))]);
    }
}
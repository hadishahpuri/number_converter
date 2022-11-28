<?php

namespace App\Controller;

use Salarmehr\Cosmopolitan\Cosmo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function convert(Request $request)
    {
//        return Cosmo::create('en')->spellout(5000000);
    }
}
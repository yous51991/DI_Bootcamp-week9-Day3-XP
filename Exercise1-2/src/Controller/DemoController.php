<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\DemoType;
use App\Form\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{

    #[Route('/demo', name: 'app_demo')]
    public function index(Request $request): Response
    {

        $test = new Test();
        $form = $this->createForm(TestType::class, $test);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
        }

        return $this->render('demo/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}

<?php

namespace App\Controller;

use App\Entity\Demo;
use App\Form\DemoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{

    #[Route('/demo', name: 'app_demo')]
    public function index(Request $request): Response
    {

        $demo = new Demo();
        $form = $this->createForm(DemoType::class, $demo);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $demo->getPhoto();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $fileName);
            $demo->setPhoto($fileName);
            return new Response("User photo is successfully uploaded.");
        }

        return $this->render('demo/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

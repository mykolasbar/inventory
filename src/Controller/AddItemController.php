<?php

namespace App\Controller;

use DateTime;
use App\Entity\Item;
use App\Form\Type\ItemType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AddItemController extends AbstractController
{
    #[Route('/additem', name: 'additem')]
    public function addArticle(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ItemType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // /** @var Article $article */

            $date = new DateTime();
            
            $data = $form->getData();

            // $item->setDateAdded($date);

            $data->setDateAdded($date);

            // dd($data);
            
            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('forms/edititem.html.twig', [
            'form' => $form, 'header' => 'Add new item'
        ]);
    }

}

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

class EditItemController extends AbstractController
{
    #[Route('/edititem/{id}', name: 'edititem')]
    public function editItem(Item $item, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ItemType::class, $item);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // /** @var Article $article */
            // $data = $form->getData();

            $date = new DateTime();

            $item->setDateUpdated($date);
            
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('forms/edititem.html.twig', [
            'form' => $form, 'header' => 'Edit item', 'item' => $item,
        ]);
    }

}

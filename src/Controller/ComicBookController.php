<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ComicBookImage;
use App\Entity\ComicBook;
use App\Entity\Editor;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;



class ComicBookController extends AbstractController
{
    /**
     * @Route("/", name="comicBook")
     */
    public function index()
    {
        return $this->render('comic_book/index.html.twig', [
            'controller_name' => 'ComicBookController',
        ]);
    }

    /**
     * @Route("/comicbook/{id}", name="comicBook_show")
     */
    public function show($id)
    {
        $comicBook = $this->getDoctrine()
            ->getRepository(ComicBook::class)
            ->find($id);

        if (!$comicBook) {
            throw $this->createNotFoundException(
                'No ComicBook found for id '.$id
            );
        }

        $editorRepository = $this->getDoctrine()
        ->getRepository(Editor::class);

        $editorObj = $editorRepository->findOneBy(['id'=>$comicBook->getEditor()]);

        return $this->render('comic_book/showComicBookDetails.html.twig', [
                'comicBook' =>$comicBook , 'editor' => $editorObj
            ]);
    }

    /**
     * @Route("/comicbooks/{editor}", name="comicBook_showEditor")
     */
    public function showEditor($editor)
    {
        $repository = $this->getDoctrine()
            ->getRepository(ComicBook::class);

        if($editor == "Marvel") {
            $editor_id = 1;
        } else {
            $editor_id = 2;
        }

        $comicBooks = $repository->findBy(
            ['editor' => $editor_id],
            ['cb_price' => 'ASC']
        );    

        if (!$comicBooks) {
            throw $this->createNotFoundException(
                'No Products found for the category '.$editor
            );
        }

        $editorRepository = $this->getDoctrine()
            ->getRepository(Editor::class);

        $editorObj = $editorRepository->findOneBy(['editor_name'=>$editor]);
            

        return $this->render('comic_book/showEditor.html.twig', [
                'comicBooks' =>$comicBooks, 'editor' => $editorObj
            ]);
    }

    /**
     * @Route("/add",name="comicBook_add")
     */
    public function add(Request $request) 
    {
        $comicBook = new ComicBook();
        $formBuiler = $this->createFormBuilder($comicBook)
        ->add('cb_name',TextType::class)
        ->add('cb_year',TextType::class)
        ->add('cb_creator',TextType::class)
        ->add('cb_description',TextareaType::class)
        ->add('cb_main_superhero',TextType::class)
        ->add('cb_image_id',EntityType::class,['class'=> ComicBookImage::class ,'choice_label' => 'id'])
        ->add('cb_main_superhero',TextType::class)
        ->add('cb_price',NumberType::class)
        ->add('editor',EntityType::class,['class'=> Editor::class ,'choice_label' => 'editor_name'])
        ->add('submit',SubmitType::class);

        $form = $formBuiler->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comicBook);
            $em->flush();

            return $this->redirectToRoute('comicBook');
        }

        return($this->render('comic_book/addComicBook.html.twig',['f' => $form->createView()]));
    }
}

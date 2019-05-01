<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;
use App\Entity\ComicBook;
use App\Entity\Editor;


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
        return $this->render('comic_book/showComicBookDetails.html.twig', [
                'comicBook' =>$comicBook
            ]);
    }

    /**
     * @Route("/comicbooks/{editor}", name="comicBook_showEditor")
     */
    public function showEditor($editor)
    {
        $repository = $this->getDoctrine()
            ->getRepository(ComicBook::class);

        $comicBooks = $repository->findBy(
            ['cb_editor' => $editor],
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
}

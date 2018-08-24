<?php

namespace DoctrineExoBundle\Controller;

use DoctrineExoBundle\Entity\Author;
use DoctrineExoBundle\Entity\Book;
use DoctrineExoBundle\Entity\Contact;
use DoctrineExoBundle\Form\AuthorType;
use DoctrineExoBundle\Form\BookType;
use DoctrineExoBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('@DoctrineExo/Default/index.html.twig');
    }

    public function listAllAuthorsAction()
    {
        // récupère le repository de l'entité Author en passant par l'entité en question
        // en récupérant le Repo, on récupère aussi ttes les méthodes définies dans la classe Repo, dont celles de base définies par Symfony
        $authorRepository = $this->getDoctrine()->getRepository(Author::class);

        // récupère tous les éléments de la table author; findAll est un array d'objet
        $authors = $authorRepository->findAll();

        return $this->render('@DoctrineExo/Default/authors.html.twig', array(
            'authors' => $authors
        ));
    }

    public function listAllBooksAction()
    {
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);
        $books = $bookRepository->findAll();

        return $this->render('@DoctrineExo/Default/books.html.twig', array(
            'books' => $books
        ));
    }

    public function findBookByIdAction($id)
    {   // récupération de l'id envoyé dans le chemin d'url

        $bookRepository = $this->getDoctrine()->getRepository(Book::class);
        // récupère les éléments  de la table book par rapport à son id grâce à la méthode find du Repo (méthode déjà définie par défaut)
        $book = $bookRepository->find($id);

        return $this->render('@DoctrineExo/Default/bookpage.html.twig', array(
            'book' => $book

        ));

    }

    public function findBookByKindAction()
    {

        $bookRepository = $this->getDoctrine()->getRepository(Book::class);

        $kind = 'Jeunesse';

        $book = $bookRepository->findByKind($kind);

        return $this->render('@DoctrineExo/Default/bookkind.html.twig', array(
            'book' => $book

        ));

    }


    public function listAllBooks2Action()
    {
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);
        $books = $bookRepository->findAllBooks();

        return $this->render('@DoctrineExo/Default/books.html.twig', array(
            'books' => $books
        ));
    }

    public function getBookByKindAction()
    {

        $bookRepository = $this->getDoctrine()->getRepository(Book::class);

        $kind = 'Roman';

        $book = $bookRepository->getBookByKind($kind);

        return $this->render('@DoctrineExo/Default/bookkind.html.twig', array(
            'book' => $book

        ));

    }

    public function createBookAction()
    {

        $book = new Book();

        $book->setImage('http://www.auzou.fr/569-large_default/le-loup-qui-voyageait-dans-le-temps.jpg');
        $book->setTitle('Le loup qui voyageait dans le temps');
        $book->setKind('Jeunesse');
        $book->setPagesNumber(32);
        $book->setFormat('Album');

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($book);
        $entityManager->flush();

        return new Response('OK');

    }

    public function createAuthorAction()
    {

        $author = new Author();

        $author->setImage('https://www.alternativesante.fr/upload/cache/medias/alain-delabos_w600_h400_r4_q90.jpg');
        $author->setPrenom('Alain');
        $author->setNom('Delabos');
        $author->setDateNaissance('1942');
        $author->setDateMort(' ');
        $author->setBiographie("Médecin nutritionniste français, il est connu pour être le père de la chrononutrition.

Cette méthode pour perdre du poids, également appelée « régime Delabos »2 ou « régime chrono-nutrition » est basée sur les biorythmes du corps humain. Elle fut élaborée en collaboration avec le professeur Jean-Robert Rapin3.

Alain Delabos est directeur général de l\'IREN4 (Institut de recherche européen sur la nutrition), il est également enseignant à la faculté de pharmacie de Dijon.");

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($author);
        $entityManager->flush();

        return new Response('Bravo');

    }


    public function deleteAuthorAction()
    {

        $authorRepository = $this->getDoctrine()->getRepository(Author::class);

        $author = $authorRepository->find('4'); // définition de la valeur de l'id en dur
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($author);
        $entityManager->flush();

        return new Response('DEAD MAN');

    }

    public function deleteBookAction($id)
    {

        // récupération du Repo Book
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);

        // utilisation la méthode find du Repository pour récupérer l’élément de l’id correspondant et on la stocke dans une variable
        $book = $bookRepository->find($id); // récupération dynamique de la valeur de l'id

        // récupération de l’entité Manager de Doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // utilisation de la méthode remove de l’entité Manager avec en paramètre l’élément à supprimer
        $entityManager->remove($book);

        // validation de la suppression
        $entityManager->flush();

        return new Response('DEAD');

    }

    public function updateBookAction()
    {
        // récupération du Repo Book
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);

        // utilisation la méthode find du Repository pour récupérer les éléments de l’id correspondant et on la stocke dans une variable
        $book = $bookRepository->find(3); // récupération de la valeur de l'id dans le dur

        $book->setTitle('Le Loulou qui ne voulait plus marcher');

        // récupération de l’entité Manager
        $entityManager = $this->getDoctrine()->getManager();

        // validation de la modification et enregistrement en BDD
        $entityManager->flush();


        return new Response('Modif OK');

    }

    public function updateAuthorAction($id)
    {
        // récupération du Repo Book
        $authorRepository = $this->getDoctrine()->getRepository(Author::class);

        // utilisation la méthode find du Repository pour récupérer l’élément de l’id correspondant et on la stocke dans une variable
        $author = $authorRepository->find($id); // récupération dynamique de la valeur de l'id

        // modification du prénom de l'auteur
        $author->setPrenom('Tonino');

        // récupération de l’entité Manager de Doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // validation de la modification
        $entityManager->flush();


        return new Response('Modif OK');

    }

    public function formBookAction(Request $request)
    {

        $book = new Book();

        $form = $this->createForm(BookType::class, $book);

        $formView = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $book = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

        }

        return $this->render('@DoctrineExo/Default/formbook.html.twig', array(
            'formView' => $formView

        ));

    }

    public function formAuthorAction(Request $request)
    {
        $author = new Author();

        $form = $this->createForm(AuthorType::class, $author);

        $formView = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $author = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($author);
            $entityManager->flush();

        }


        return $this->render('@DoctrineExo/Default/formauthor.html.twig', array(
            'formView' => $formView

        ));


    }

    public function formBookUpdateAction(Request $request, $id)
    {
        // récupération du Repo Book
        $bookRepository = $this->getDoctrine()->getRepository(Book::class);

        // utilisation la méthode find du Repository pour récupérer les éléments de l’id correspondant et on la stocke dans une variable
        $book = $bookRepository->find($id); // récupération de la valeur de l'id dans le dur

        $form = $this->createForm(BookType::class, $book);

        $formView = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){


            $book = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

        }

        return $this->render('@DoctrineExo/Default/formbookupdate.html.twig', array(
            'formView' => $formView
        ));

    }

    public function contactUsAction(Request $request)
    {

        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $formView = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $contact= $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

        }

        return $this->render('@DoctrineExo/Default/contact.html.twig', array(
            'formView' => $formView
        ));

    }

}



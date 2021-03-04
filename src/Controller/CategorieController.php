<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Categorie;
use App\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AjouterCategorieType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;

class CategorieController extends AbstractController
{   public function __construct(
    EntityManagerInterface $em,CategorieRepository $categorieRepository
)
{
    $this->em=$em;
    $this->categorieRepository=$categorieRepository;

}

    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
    /**
     *
     * @Route("/Affichecategorie", name="categories")
     */
    public function Affiche()
    {

        $Categorie = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render("categorie/categories.html.twig", ['categorie' => $Categorie]);
    }
    /**
     * @Route("/new", name="categorie_new", methods={"GET","POST"})
     */
    public function AffciherCategorie(Request $request): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(AjouterCategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();
            return $this->redirectToRoute('categories');

        }
        return $this->render('categorie/AjouterCategorie.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/remove/{id}",name="article")
     */
    public function remove($id)
    {
        $cat=$this->categorieRepository->findByExampleField($id);
        $this->em->remove($cat);
        $this->em->flush();
        return $this->redirectToRoute('Affichecategorie');

    }

    /**
     * @Route("/update/{id}",name="edit_article")
     */
    public function update(Request $request,$id)
    {        $categorie = new Categorie();

        $cat=$this->categorieRepository->findByExampleField($id);

        $form = $this->createForm(AjouterCategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $f = $form->getData();
            $cat->setNomCat($f->getNomCat());

            $this->em->persist($cat);
            $this->em->flush();
            return  $this->redirectToRoute('Affichecategorie');
        }

        return $this->render('edit/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}



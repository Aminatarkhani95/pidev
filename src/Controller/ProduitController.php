<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Form\AjouterCategorieType;
use App\Form\ProduitType;

use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;

class ProduitController extends AbstractController
{   public function __construct(
    EntityManagerInterface $em,ProduitRepository $produitRepository
)
{
    $this->em=$em;
    $this->produitRepository=$produitRepository;

}



    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
    /**
     * @Route("/AfficherProduit", name="produit_new", methods={"GET","POST"})
     */
    public function AffciherProduit(Request $request): Response
    {

        $produit = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        return $this->render("produit/products.html.twig", ['produit' => $produit]);

    }

    /**
     * @Route("/newp", name="newp")
     */
    public function new (Request $request)
    {
        $produit = new Produit();
        $pro = new Produit();
        $categorie = new Categorie ();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $f = $form->getData();
            $pro->setNomProd($f->getNomProd());
            $pro->setDescProd($f->getDescProd());
            $pro->setPrixProd($f->getPrixProd());
            $pro->setImageProd($f->getImageProd());
            $pro->setQteProd($f->getQteprod());
            $pro->setValidProd($f->getValidProd());
            $pro->setIdVen($f->getIdVen());


            $pro->setIdCat($f->getIdCat());

            $this->em->persist($pro);
            $this->em->flush();
            return $this->redirectToRoute('newp');
        }

        return $this->render('produit/AjouterProduit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/removep/{id}",name="produit")
     */
    public function remove($id)
    {
        $cat=$this->produitRepository->findByExampleField($id);
        $this->em->remove($cat);
        $this->em->flush();
        return $this->redirectToRoute('produit_new');

    }
    /**
     * @Route("/updatep/{id}",name="edit_article")
     */
    public function update(Request $request,$id)
    {        $produit = new Produit();

        $pro=$this->produitRepository->findByExampleField($id);

        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $f = $form->getData();
            $pro->setNomProd($f->getNomProd());
            $pro->setDescProd($f->getDescProd());
            $pro->setPrixProd($f->getPrixProd());
            $pro->setImageProd($f->getImageProd());
            $pro->setQteProd($f->getQteprod());
            $pro->setValidProd($f->getValidProd());
            $pro->setIdVen($f->getIdVen());


            $this->em->persist($pro);
            $this->em->flush();
            return  $this->redirectToRoute('produit_new');
        }

        return $this->render('produit/formulaire.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

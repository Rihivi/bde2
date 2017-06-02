<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Commentary;
use Main\MainBundle\Entity\Media;
use Main\MainBundle\Entity\Products;
use Main\MainBundle\Form\CommentaryType;
use Main\MainBundle\Form\MediaType;
use Main\MainBundle\Form\ProductsAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Entity\Contact;
use Main\MainBundle\Entity\Activity;
use Main\MainBundle\Entity\ActivityProposal;
use Main\MainBundle\Form\ContactType;
use Main\MainBundle\Form\ActivityProposal1Type;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    public function indexAction()
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        $evenements = $this->getDoctrine()->getRepository('MainBundle:Activity')->findAll();
        return $this->render('MainBundle:Default:layout\accueil.html.twig', array('Panier' => $Panier, 'evenements' => $evenements));
    }

    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact Test')
                    ->setFrom('enquiries@symblog.co.uk')
                    ->setTo('tnpcclqp@gmail.com')
                    ->setBody($this->renderView('MainBundle:Contact:contactEmail.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->Add('notice', 'Your contact enquiry was successfully sent. Thank you!');


                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return $this->render('MainBundle:Contact:contact.html.twig', array('form' => $form->createView()));
    }

    public function boutiqueAction()
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        $articles = $this->getDoctrine()->getRepository('MainBundle:Products')->findAll();
        $panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();

        return $this->render('MainBundle:Default:layout\boutique.html.twig', array('articles' => $articles, 'panier' => $panier, 'Panier' => $Panier));
    }

    public function inscriptionAction()
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        return $this->render('MainBundle:Default:layout\inscription.html.twig', array('Panier' => $Panier));
    }

    public function propositionsAction(Request $request)
    {
        $propositions = $this->getDoctrine()->getRepository('MainBundle:ActivityProposal')->findAll();
        $propositions2 = $this->getDoctrine()->getRepository('MainBundle:ActivityProposal')->findAll();
        $proposal = new ActivityProposal();
        $em = $this->getDoctrine()->getManager();

//        $form2 = $this->setContainer

        $form = $this->createForm(new ActivityProposal1Type(), $proposal);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();
        }


        return $this->render('MainBundle:Default:layout\propositions.html.twig', array('propositions' => $propositions,
            'form' => $form->createView()));
    }

    public function panierAction()
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        $article = $this->getDoctrine()->getRepository('MainBundle:Products')->findAll();

        $total = 0;
        foreach ($Panier as $value) {
            $total += $value->getProduct()->getPrice();
        }

        return $this->render('MainBundle:Default:layout\panier.html.twig', array('Panier' => $Panier, 'article' => $article, 'total' => $total));
    }

    public function evenementAllAction()
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        $activitys = $this->getDoctrine()->getRepository('MainBundle:Activity')->findAll();
        return $this->render('MainBundle:Default:layout\evenementAll.html.twig', array('Panier' => $Panier, 'activitys' => $activitys));
    }

    public function articleAction($id)
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        $article = $this->getDoctrine()->getRepository('MainBundle:Products')->find($id);

        return $this->render('MainBundle:Default:layout\article.html.twig', array('article' => $article, 'Panier' => $Panier));
    }

    public function detailEvenementAction($id)
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();
        $evenement = $this->getDoctrine()->getRepository('MainBundle:Activity')->find($id);

        return $this->render('MainBundle:Default:layout\detailEvenement.html.twig', array('evenement' => $evenement, 'Panier' => $Panier));
    }

    public function NbPanierAction()
    {
        $Panier = $this->getDoctrine()->getRepository('MainBundle:Cart')->findAll();

        return $this->render('::ModulesUsed\layout.html.twig', array('Panier' => $Panier));
    }

    public function descriptionPropositionAction($id, Request $request)
    {
        $proposition = $this->getDoctrine()->getRepository('MainBundle:ActivityProposal')->find($id);

        $form = $this->createForm(new ActivityProposal1Type(), $proposition);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $proposition->addCommentary($proposition);
            $em->persist($proposition);
            $em->flush();
        }

        return $this->render('MainBundle:Default:layout\descriptionProposition.html.twig', array('proposition' => $proposition,
            'form' => $form->createView()));
    }
    public function evenementAction($id, Request $request)
    {
        $evenement = $this->getDoctrine()->getRepository('MainBundle:Activity')->findOneById($id);
        $commentary= new Commentary();
        $media= new Media();

        $form2 = $this->createForm(new MediaType(), $media);
//        var_dump($form2);
//        if ($form2->isValid()) {
//            echo '<script>alert("TON TEXTE");</script>';
//
//            $em = $this->getDoctrine()->getManager();
////            $evenement->addMedia($this->getReference($media));
//            $em->persist($media);
//            $em->flush();
//        }

        $form = $this->createForm(new CommentaryType(), $commentary);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $evenement->addCommentary($commentary);
            $em->persist($commentary);
            $em->persist($evenement);
            $em->flush();
        }
//        , 'form' => $form->createView()
        return $this->render('MainBundle:Default:layout\evenement.html.twig', array('evenement' => $evenement, 'form' => $form->createView()));
    }

    public function AddImageAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $this->getDoctrine()->getRepository('MainBundle:Activity')->findOneById($id);
//        $commentary= new Commentary();
        $media= new Media();

        $form = $this->createForm(new MediaType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            $evenement->addMedia($this->getReference($media));
            $em->persist($media);
            $em->flush();
        }

        return $this->render('MainBundle:Default:layout\AddImage.html.twig', array('evenement' => $evenement,'form' => $form->createView()));
    }



//    public function formCommentary(Request $request)
//    {
//        $commentary = $this->getDoctrine()->getRepository('MainBundle:Commentary')->findAll();
//
//        $form = $this->createForm(new ActivityProposal1Type(), $commentary);
//        $form->handleRequest($request);
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($commentary);
//            $em->flush();
//        }
//        return $this->render('MainBundle:Default:layout\evenement.html.twig', array('form' => $form->createView()));
//    }
}



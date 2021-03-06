<?php

namespace Easy\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumController extends Controller
{
    public function indexAction()
    {
        // Récupération des catégories
        $categories_forums = $this->getDoctrine()->getManager()->getRepository('EasyForumBundle:CategorieForum')->findAll();
        $nb_utilisateurs = count($this->getDoctrine()->getManager()->getRepository('EasyUtilisateurBundle:Utilisateur')->findAll());
        $nb_sujets = count($this->getDoctrine()->getManager()->getRepository('EasyForumBundle:Sujet')->findAll());
        $nb_messages = count($this->getDoctrine()->getManager()->getRepository('EasyForumBundle:Message')->findAll());
        $nb_messages_forum = $this->getDoctrine()->getManager()->getRepository('EasyForumBundle:Message')->selectNbMessagesForum();
        
        return $this->render('EasyForumBundle:Forum:index.html.twig', array('categories_forums' => $categories_forums, 
                                                                            'nb_messages' => $nb_messages, 
                                                                            'nb_messages_forum' => $nb_messages_forum, 
                                                                            'nb_sujets' => $nb_sujets, 
                                                                            'nb_utilisateurs' => $nb_utilisateurs));
    }
    
    public function listAdminAction()
    {
        $categories_forums = $this->getDoctrine()->getManager()->getRepository('EasyForumBundle:CategorieForum')->findAll();
        
        return $this->render('EasyForumBundle:Forum:listAdmin.html.twig', array('categories_forums' => $categories_forums));
    }
}

<?php

namespace Easy\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sujet
 *
 * @ORM\Table(name="sujet")
 * @ORM\Entity
 */
class Sujet
{
    /**
    * @ORM\ManyToOne(targetEntity="Easy\ForumBundle\Entity\Forum")
    * @ORM\JoinColumn(nullable=false)
    */
    private $forum;
    
    /**
    * @ORM\ManyToOne(targetEntity="Easy\UtilisateurBundle\Entity\Utilisateur")
    * @ORM\JoinColumn(nullable=false)
    */
    private $utilisateur;
    
    /**
    * @ORM\OneToMany(targetEntity="Easy\ForumBundle\Entity\Message", mappedBy="sujet")
    */
    private $messages;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=45, nullable=true)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;
    
    /**
     * @var boolean $estImportant
     *
     * @ORM\Column(name="estImportant", type="boolean")
     */
    private $estImportant = 0;
    
    /**
     * @var boolean $estFerme
     *
     * @ORM\Column(name="estFerme", type="boolean")
     */
    private $estFerme = 0;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Sujet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Sujet
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set forum
     *
     * @param \Easy\ForumBundle\Entity\Forum $forum
     * @return Sujet
     */
    public function setForum(\Easy\ForumBundle\Entity\Forum $forum)
    {
        $this->forum = $forum;
    
        return $this;
    }

    /**
     * Get forum
     *
     * @return \Easy\ForumBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add messages
     *
     * @param \Easy\ForumBundle\Entity\Message $messages
     * @return Sujet
     */
    public function addMessage(\Easy\ForumBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Easy\ForumBundle\Entity\Message $messages
     */
    public function removeMessage(\Easy\ForumBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set utilisateur
     *
     * @param \Easy\UtilisateurBundle\Entity\Utilisateur $utilisateur
     * @return Sujet
     */
    public function setUtilisateur(\Easy\UtilisateurBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Easy\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set estImportant
     *
     * @param boolean $estImportant
     * @return Sujet
     */
    public function setEstImportant($estImportant)
    {
        $this->estImportant = $estImportant;
    
        return $this;
    }

    /**
     * Get estImportant
     *
     * @return boolean 
     */
    public function getEstImportant()
    {
        return $this->estImportant;
    }

    /**
     * Set estFerme
     *
     * @param boolean $estFerme
     * @return Sujet
     */
    public function setEstFerme($estFerme)
    {
        $this->estFerme = $estFerme;
    
        return $this;
    }

    /**
     * Get estFerme
     *
     * @return boolean 
     */
    public function getEstFerme()
    {
        return $this->estFerme;
    }
}
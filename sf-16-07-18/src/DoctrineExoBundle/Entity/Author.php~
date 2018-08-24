<?php

namespace DoctrineExoBundle\Entity;

/**
 * Author
 */
class Author
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Author
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Author
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

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
     * @var \DateTime
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     */
    private $dateMort;


    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Author
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateMort
     *
     * @param \DateTime $dateMort
     *
     * @return Author
     */
    public function setDateMort($dateMort)
    {
        $this->dateMort = $dateMort;

        return $this;
    }

    /**
     * Get dateMort
     *
     * @return \DateTime
     */
    public function getDateMort()
    {
        return $this->dateMort;
    }
    /**
     * @var string
     */
    private $biographie;


    /**
     * Set biographie
     *
     * @param string $biographie
     *
     * @return Author
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * Get biographie
     *
     * @return string
     */
    public function getBiographie()
    {
        return $this->biographie;
    }
    /**
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Author
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $book;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->book = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add book
     *
     * @param \DoctrineExoBundle\Entity\Book $book
     *
     * @return Author
     */
    public function addBook(\DoctrineExoBundle\Entity\Book $book)
    {
        $this->book[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \DoctrineExoBundle\Entity\Book $book
     */
    public function removeBook(\DoctrineExoBundle\Entity\Book $book)
    {
        $this->book->removeElement($book);
    }

    /**
     * Get book
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBook()
    {
        return $this->book;
    }
}

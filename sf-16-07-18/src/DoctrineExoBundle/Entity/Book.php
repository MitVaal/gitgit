<?php

namespace DoctrineExoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Book
 */
class Book
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $kind;

    /**
     * @var int
     */
    private $pagesNumber;

    /**
     * @var string
     */
    private $format;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set kind
     *
     * @param string $kind
     *
     * @return Book
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set pagesNumber
     *
     * @param integer $pagesNumber
     *
     * @return Book
     */
    public function setPagesNumber($pagesNumber)
    {
        $this->pagesNumber = $pagesNumber;

        return $this;
    }

    /**
     * Get pagesNumber
     *
     * @return int
     */
    public function getPagesNumber()
    {
        return $this->pagesNumber;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Book
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
    /**
     * @var string
     * @Assert\Length(
     *     min = 2,
     *     max = 42)
     *
     */
    private $title;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
     * @return Book
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
     * @var \DoctrineExoBundle\Entity\Author
     */
    private $author;


    /**
     * Set author
     *
     * @param \DoctrineExoBundle\Entity\Author $author
     *
     * @return Book
     */
    public function setAuthor(\DoctrineExoBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \DoctrineExoBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}

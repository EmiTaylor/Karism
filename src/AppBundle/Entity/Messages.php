<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="expositions", columns={"expositions"}), @ORM\Index(name="author", columns={"author"})})
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text", length=65535, nullable=false)
     */
    private $texte;

    /**
     * @var integer
     *
     * @ORM\Column(name="time", type="integer", nullable=false)
     */
    private $time;

    /**
     * @var \AppBundle\Entity\Expositions
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Expositions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expositions", referencedColumnName="id")
     * })
     */
    private $expositions;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author", referencedColumnName="id")
     * })
     */
    private $author;



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
     * Set texte
     *
     * @param string $texte
     *
     * @return Messages
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Messages
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set expositions
     *
     * @param \AppBundle\Entity\Expositions $expositions
     *
     * @return Messages
     */
    public function setExpositions(\AppBundle\Entity\Expositions $expositions = null)
    {
        $this->expositions = $expositions;

        return $this;
    }

    /**
     * Get expositions
     *
     * @return \AppBundle\Entity\Expositions
     */
    public function getExpositions()
    {
        return $this->expositions;
    }

    /**
     * Set author
     *
     * @param \AppBundle\Entity\Users $author
     *
     * @return Messages
     */
    public function setAuthor(\AppBundle\Entity\Users $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\Users
     */
    public function getAuthor()
    {
        return $this->author;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expositions
 *
 * @ORM\Table(name="expositions")
 * @ORM\Entity
 */
class Expositions
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
     * @var integer
     *
     * @ORM\Column(name="placehote", type="integer", nullable=false)
     */
    private $placehote;

    /**
     * @var integer
     *
     * @ORM\Column(name="artiste", type="integer", nullable=false)
     */
    private $artiste;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="listeinvite", type="integer", nullable=false)
     */
    private $listeinvite;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="artistviewed", type="boolean", nullable=false)
     */
    private $artistviewed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hoteviewed", type="boolean", nullable=false)
     */
    private $hoteviewed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="checklistehote", type="boolean", nullable=false)
     */
    private $checklistehote;

    /**
     * @var boolean
     *
     * @ORM\Column(name="checklisteartist", type="boolean", nullable=false)
     */
    private $checklisteartist;



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
     * Set placehote
     *
     * @param integer $placehote
     *
     * @return Expositions
     */
    public function setPlacehote($placehote)
    {
        $this->placehote = $placehote;

        return $this;
    }

    /**
     * Get placehote
     *
     * @return integer
     */
    public function getPlacehote()
    {
        return $this->placehote;
    }

    /**
     * Set artiste
     *
     * @param integer $artiste
     *
     * @return Expositions
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste
     *
     * @return integer
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Expositions
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
     * Set listeinvite
     *
     * @param integer $listeinvite
     *
     * @return Expositions
     */
    public function setListeinvite($listeinvite)
    {
        $this->listeinvite = $listeinvite;

        return $this;
    }

    /**
     * Get listeinvite
     *
     * @return integer
     */
    public function getListeinvite()
    {
        return $this->listeinvite;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Expositions
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set artistviewed
     *
     * @param boolean $artistviewed
     *
     * @return Expositions
     */
    public function setArtistviewed($artistviewed)
    {
        $this->artistviewed = $artistviewed;

        return $this;
    }

    /**
     * Get artistviewed
     *
     * @return boolean
     */
    public function getArtistviewed()
    {
        return $this->artistviewed;
    }

    /**
     * Set hoteviewed
     *
     * @param boolean $hoteviewed
     *
     * @return Expositions
     */
    public function setHoteviewed($hoteviewed)
    {
        $this->hoteviewed = $hoteviewed;

        return $this;
    }

    /**
     * Get hoteviewed
     *
     * @return boolean
     */
    public function getHoteviewed()
    {
        return $this->hoteviewed;
    }

    /**
     * Set checklistehote
     *
     * @param boolean $checklistehote
     *
     * @return Expositions
     */
    public function setChecklistehote($checklistehote)
    {
        $this->checklistehote = $checklistehote;

        return $this;
    }

    /**
     * Get checklistehote
     *
     * @return boolean
     */
    public function getChecklistehote()
    {
        return $this->checklistehote;
    }

    /**
     * Set checklisteartist
     *
     * @param boolean $checklisteartist
     *
     * @return Expositions
     */
    public function setChecklisteartist($checklisteartist)
    {
        $this->checklisteartist = $checklisteartist;

        return $this;
    }

    /**
     * Get checklisteartist
     *
     * @return boolean
     */
    public function getChecklisteartist()
    {
        return $this->checklisteartist;
    }
}

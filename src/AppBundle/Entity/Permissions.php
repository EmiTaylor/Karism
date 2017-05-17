<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permissions
 *
 * @ORM\Table(name="permissions", indexes={@ORM\Index(name="role_user", columns={"role_user"})})
 * @ORM\Entity
 */
class Permissions
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
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route;

    /**
     * @var boolean
     *
     * @ORM\Column(name="action", type="boolean", nullable=false)
     */
    private $action;

    /**
     * @var \AppBundle\Entity\Roles
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_user", referencedColumnName="role")
     * })
     */
    private $roleUser;



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
     * Set route
     *
     * @param string $route
     *
     * @return Permissions
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set action
     *
     * @param boolean $action
     *
     * @return Permissions
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return boolean
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set roleUser
     *
     * @param \AppBundle\Entity\Roles $roleUser
     *
     * @return Permissions
     */
    public function setRoleUser(\AppBundle\Entity\Roles $roleUser = null)
    {
        $this->roleUser = $roleUser;

        return $this;
    }

    /**
     * Get roleUser
     *
     * @return \AppBundle\Entity\Roles
     */
    public function getRoleUser()
    {
        return $this->roleUser;
    }
}

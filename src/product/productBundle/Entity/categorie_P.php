<?php

namespace product\productBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie_P
 *
 * @ORM\Table(name="categorie__p")
 * @ORM\Entity(repositoryClass="product\productBundle\Repository\categorie_PRepository")
 */
class categorie_P
{
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
     * @ORM\Column(name="nomc", type="string", length=255, nullable=false)
     */
    private $nomc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNomc()
    {
        return $this->nomc;
    }

    /**
     * @param string $nomc
     */
    public function setNomc($nomc)
    {
        $this->nomc = $nomc;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}


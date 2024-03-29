<?php

namespace OpinionBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * Opinion
 *
 * @ORM\Table(name="opinion")
 * @ORM\Entity(repositoryClass="OpinionBundle\Repository\OpinionRepository")
 */
class Opinion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_op", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOp;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note = '0';

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */


    private $user;


    /**
     * Get idOp
     *
     * @return integer
     */
    public function getIdOp()
    {
        return $this->idOp;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Opinion
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }
    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Opinion
     */
    public function setIdUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->user;
    }
    /**
     * @return \AppBundle\Entity\User
     */


    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Opinion
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }


}
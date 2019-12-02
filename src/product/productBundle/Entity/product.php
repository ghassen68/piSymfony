<?php

namespace product\productBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="product\productBundle\Repository\productRepository")
 */
class product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_P", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idP;

    /**
     * @var string
     *
     * @ORM\Column(name="type_P", type="string", length=25, nullable=false)
     */
    private $typeP;

    /**
     * @var string
     *
     * @ORM\Column(name="marque_P", type="string", length=25, nullable=false)
     */
    private $marqueP;

    /**
     * @var string
     *
     * @ORM\Column(name="color_P", type="string", length=255, nullable=false)
     */
    private $colorP;

    /**
     * @var string
     *
     * @ORM\Column(name="size_P", type="string", length=25, nullable=false)
     */
    private $sizeP;

    /**
     * @var float
     *
     * @ORM\Column(name="price_P", type="float", precision=10, scale=0, nullable=false)
     */
    private $priceP;

    /**
     * @var string
     *
     * @ORM\Column(name="description_p", type="string", length=255, nullable=false)
     */
    private $descriptionP;

    /**
     * @var string
     *
     * @ORM\Column(name="genre_P", type="string", length=25, nullable=false)
     */
    private $genreP;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte_P", type="integer", nullable=false)
     */
    private $qteP;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="product\productBundle\Entity\categorie_P")
     * @ORM\JoinColumn(nullable=true)
     */


    private $categoriep;

    /**
     * @return int
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param int $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    /**
     * @return string
     */
    public function getTypeP()
    {
        return $this->typeP;
    }

    /**
     * @param string $typeP
     */
    public function setTypeP($typeP)
    {
        $this->typeP = $typeP;
    }

    /**
     * @return string
     */
    public function getMarqueP()
    {
        return $this->marqueP;
    }

    /**
     * @param string $marqueP
     */
    public function setMarqueP($marqueP)
    {
        $this->marqueP = $marqueP;
    }

    /**
     * @return string
     */
    public function getColorP()
    {
        return $this->colorP;
    }

    /**
     * @param string $colorP
     */
    public function setColorP($colorP)
    {
        $this->colorP = $colorP;
    }

    /**
     * @return string
     */
    public function getSizeP()
    {
        return $this->sizeP;
    }

    /**
     * @param string $sizeP
     */
    public function setSizeP($sizeP)
    {
        $this->sizeP = $sizeP;
    }

    /**
     * @return float
     */
    public function getPriceP()
    {
        return $this->priceP;
    }

    /**
     * @param float $priceP
     */
    public function setPriceP($priceP)
    {
        $this->priceP = $priceP;
    }

    /**
     * @return string
     */
    public function getDescriptionP()
    {
        return $this->descriptionP;
    }

    /**
     * @param string $descriptionP
     */
    public function setDescriptionP($descriptionP)
    {
        $this->descriptionP = $descriptionP;
    }

    /**
     * @return string
     */
    public function getGenreP()
    {
        return $this->genreP;
    }

    /**
     * @param string $genreP
     */
    public function setGenreP($genreP)
    {
        $this->genreP = $genreP;
    }

    /**
     * @return int
     */
    public function getQteP()
    {
        return $this->qteP;
    }

    /**
     * @param int $qteP
     */
    public function setQteP($qteP)
    {
        $this->qteP = $qteP;
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

    /**
     * @return mixed
     */
    public function getCategoriep()
    {
        return $this->categoriep;
    }

    /**
     * @param mixed $categoriep
     */
    public function setCategoriep($categoriep)
    {
        $this->categoriep = $categoriep;
    }

}


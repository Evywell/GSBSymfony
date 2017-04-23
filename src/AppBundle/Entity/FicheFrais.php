<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheFrais
 *
 * @ORM\Table(name="fiche_frais")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FicheFraisRepository")
 */
class FicheFrais
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id_visiteur", referencedColumnName="id")
     */
    private $idVisiteur;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=6)
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="nbjustificatifs", type="integer")
     */
    private $nbjustificatifs;

    /**
     * @var float
     *
     * @ORM\Column(name="montantvalide", type="float")
     */
    private $montantvalide;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemodif", type="date")
     */
    private $datemodif;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumn(name="id_etat", referencedColumnName="id")
     */
    private $Etat;

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
     * Set idVisiteur
     *
     * @param integer $idVisiteur
     *
     * @return FicheFrais
     */
    public function setIdVisiteur($idVisiteur)
    {
        $this->idVisiteur = $idVisiteur;

        return $this;
    }

    /**
     * Get idVisiteur
     *
     * @return int
     */
    public function getIdVisiteur()
    {
        return $this->idVisiteur;
    }

    /**
     * Set mois
     *
     * @param string $mois
     *
     * @return FicheFrais
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return string
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set nbjustificatifs
     *
     * @param integer $nbjustificatifs
     *
     * @return FicheFrais
     */
    public function setNbjustificatifs($nbjustificatifs)
    {
        $this->nbjustificatifs = $nbjustificatifs;

        return $this;
    }

    /**
     * Get nbjustificatifs
     *
     * @return int
     */
    public function getNbjustificatifs()
    {
        return $this->nbjustificatifs;
    }

    /**
     * Set montantvalide
     *
     * @param float $montantvalide
     *
     * @return FicheFrais
     */
    public function setMontantvalide($montantvalide)
    {
        $this->montantvalide = $montantvalide;

        return $this;
    }

    /**
     * Get montantvalide
     *
     * @return float
     */
    public function getMontantvalide()
    {
        return $this->montantvalide;
    }

    /**
     * Set datemodif
     *
     * @param \DateTime $datemodif
     *
     * @return FicheFrais
     */
    public function setDatemodif($datemodif)
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    /**
     * Get datemodif
     *
     * @return \DateTime
     */
    public function getDatemodif()
    {
        return $this->datemodif;
    }

    /**
     * Set Etat
     *
     * @param string $etat
     *
     * @return FicheFrais
     */
    public function setEtat($etat)
    {
        $this->Etat = $etat;

        return $this;
    }

    /**
     * Get Etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->Etat;
    }

    /**
     * @return string
     */
    public function getFormatedMois()
    {
        return substr($this->mois, 4, 2) . '/' . substr($this->mois, 0, 4);
    }

}


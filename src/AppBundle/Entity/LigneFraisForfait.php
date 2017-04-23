<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneFraisForfait
 *
 * @ORM\Table(name="ligne_frais_forfait")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LigneFraisForfaitRepository")
 */
class LigneFraisForfait
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
     *
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
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="FraisForfait")
     * @ORM\JoinColumn(name="id_frais_forfait", referencedColumnName="id")
     */
    private $idFraisForfait;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="FicheFrais")
     * @ORM\JoinColumn(name="id_fiche_frais", referencedColumnName="id")
     */
    private $idFicheFrais;


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
     * @return ligneFraisForfait
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
     * @return ligneFraisForfait
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
     * Set idFraisForfait
     *
     * @param string $idFraisForfait
     *
     * @return ligneFraisForfait
     */
    public function setIdFraisForfait($idFraisForfait)
    {
        $this->idFraisForfait = $idFraisForfait;

        return $this;
    }

    /**
     * Get idFraisForfait
     *
     * @return string
     */
    public function getIdFraisForfait()
    {
        return $this->idFraisForfait;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return ligneFraisForfait
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $idFicheFrais
     * @return LigneFraisForfait
     */
    public function setIdFicheFrais($idFicheFrais)
    {
        $this->idFicheFrais = $idFicheFrais;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdFicheFrais()
    {
        return $this->idFicheFrais;
    }
}


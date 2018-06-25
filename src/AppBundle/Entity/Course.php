<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="cou_course")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CourseRepository")
 */
class Course
{
    /**
     * @var int
     *
     * @ORM\Column(name="cou_oid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cou_distance", type="string", length=255)
     */
    private $distance;

   /**
     * @var string
     * 
     * @ORM\ManyToOne(targetEntity="Chauffeur")
     * @ORM\JoinColumn(name="cha_oid", referencedColumnName="cha_oid")
     */
    private $chauffeur;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adr_oid_dpt", referencedColumnName="adr_oid")
     * 
     */
    private $adresseDpt;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adr_oid_arr", referencedColumnName="adr_oid")
     */
    private $adresseArr;


    /**
     * Many Courses have Many PAssagers.
     * @ORM\ManyToMany(targetEntity="Passager")
     * @ORM\JoinTable(name="ncp_nn_cou_pas",
     *      joinColumns={@ORM\JoinColumn(name="cou_oid", referencedColumnName="cou_oid")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pas_oid", referencedColumnName="pas_oid")}
     *      )
     */
    private $passagers;

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
     * Set distance
     *
     * @param string $distance
     *
     * @return Course
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return string
     */
    public function getDistance()
    {
        return $this->distance;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->passagers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set chauffeur
     *
     * @param \AppBundle\Entity\Chauffeur $chauffeur
     *
     * @return Course
     */
    public function setChauffeur(\AppBundle\Entity\Chauffeur $chauffeur = null)
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    /**
     * Get chauffeur
     *
     * @return \AppBundle\Entity\Chauffeur
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * Set adresseDpt
     *
     * @param \AppBundle\Entity\Adresse $adresseDpt
     *
     * @return Course
     */
    public function setAdresseDpt(\AppBundle\Entity\Adresse $adresseDpt = null)
    {
        $this->adresseDpt = $adresseDpt;

        return $this;
    }

    /**
     * Get adresseDpt
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseDpt()
    {
        return $this->adresseDpt;
    }

    /**
     * Set adresseArr
     *
     * @param \AppBundle\Entity\Adresse $adresseArr
     *
     * @return Course
     */
    public function setAdresseArr(\AppBundle\Entity\Adresse $adresseArr = null)
    {
        $this->adresseArr = $adresseArr;

        return $this;
    }

    /**
     * Get adresseArr
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseArr()
    {
        return $this->adresseArr;
    }

    /**
     * Add passager
     *
     * @param \AppBundle\Entity\Passager $passager
     *
     * @return Course
     */
    public function addPassager(\AppBundle\Entity\Passager $passager)
    {
        $this->passagers[] = $passager;

        return $this;
    }

    /**
     * Remove passager
     *
     * @param \AppBundle\Entity\Passager $passager
     */
    public function removePassager(\AppBundle\Entity\Passager $passager)
    {
        $this->passagers->removeElement($passager);
    }

    /**
     * Get passagers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassagers()
    {
        return $this->passagers;
    }
}

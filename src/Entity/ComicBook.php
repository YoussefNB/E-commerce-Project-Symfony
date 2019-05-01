<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\ComicBookImage;
use App\Entity\Editor;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ComicBookRepository")
 */
class ComicBook
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb_year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb_creator;

    /**
     * @ORM\Column(type="string", length=800)
     */
    private $cb_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb_editor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb_mainSuperhero;
    
    /**
     * @ORM\OneToOne(targetEntity="ComicBookImage",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cb_image;

    /**
     * @ORM\Column(type="float")
     */
    private $cb_price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Editor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCbName(): ?string
    {
        return $this->cb_name;
    }

    public function setCbName(string $cb_name): self
    {
        $this->cb_name = $cb_name;

        return $this;
    }

    public function getCbYear(): ?string
    {
        return $this->cb_year;
    }

    public function setCbYear(string $cb_year): self
    {
        $this->cb_year = $cb_year;

        return $this;
    }

    public function getCbCreator(): ?string
    {
        return $this->cb_creator;
    }

    public function setCbCreator(string $cb_creator): self
    {
        $this->cb_creator = $cb_creator;

        return $this;
    }

    public function getCbDescription(): ?string
    {
        return $this->cb_description;
    }

    public function setCbDescription(string $cb_description): self
    {
        $this->cb_description = $cb_description;

        return $this;
    }

    public function getCbEditor(): ?string
    {
        return $this->cb_editor;
    }

    public function setCbEditor(string $cb_editor): self
    {
        $this->cb_editor = $cb_editor;

        return $this;
    }

    public function getCbMainSuperhero(): ?string
    {
        return $this->cb_mainSuperhero;
    }

    public function setCbMainSuperhero(string $cb_mainSuperhero): self
    {
        $this->cb_mainSuperhero = $cb_mainSuperhero;

        return $this;
    }

    /**
     * Set image
     * @param ComicBookImage $cb_image
     * @return ComicBookImage
     */
    public function setCbImage(ComicBookImage $cb_image) 
    {
        $this->cb_image=$cb_image;
        return($this);
    }

    /**
     * Get image
     * @return ComicBookImage
     */
    public function getCbImage() : ?ComicBookImage
    { 
        return($this->cb_image);
    }


    //In order for the addComicBook.html.twig to work.
    /**
     * Get image
     * @return ComicBookImage
     */
    public function getCbImageId() : ?ComicBookImage
    { 
        return($this->cb_image);
    }

    public function setCbImageId(ComicBookImage $cb_image) 
    {
        $this->cb_image=$cb_image;
        return($this);
    }

    public function getCbPrice(): ?float
    {
        return $this->cb_price;
    }

    public function setCbPrice(float $cb_price): self
    {
        $this->cb_price = $cb_price;

        return $this;
    }

    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    public function setEditor(?Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getEditorId(): ?Editor
    {
        return $this->editor;
    }
}

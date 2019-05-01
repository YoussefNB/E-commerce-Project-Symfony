<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComicBookImageRepository")
 */
class ComicBookImage
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
    private $cb_image_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb_image_alt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCbImageUrl(): ?string
    {
        return $this->cb_image_url;
    }

    public function setCbImageUrl(string $cb_image_url): self
    {
        $this->cb_image_url = $cb_image_url;

        return $this;
    }

    public function getCbImageAlt(): ?string
    {
        return $this->cb_image_alt;
    }

    public function setCbImageAlt(string $cb_image_alt): self
    {
        $this->cb_image_alt = $cb_image_alt;

        return $this;
    }
}

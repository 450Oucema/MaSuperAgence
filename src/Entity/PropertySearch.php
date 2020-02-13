<?php


namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{

    /**
     * @var int|null
     * @Assert\Range(min="10",max="400")
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */

    private $options;

    /**
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     * @return PropertySearch
     */
    public function setOptions(ArrayCollection $options): PropertySearch
    {
        $this->options = $options;
        return $this;
    }

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * @param mixed $minSurface
     * @return PropertySearch
     */
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    private $max_price;

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->max_price;
    }

    /**
     * @param mixed $max_price
     */
    public function setMaxPrice($max_price): void
    {
        $this->max_price = $max_price;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->min_price;
    }

    /**
     * @param mixed $min_price
     */
    public function setMinPrice($min_price): void
    {
        $this->min_price = $min_price;
    }
    private $min_price;
}
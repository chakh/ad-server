<?php

final class BidRequest
{
    public $price = 0;
    public $adTag = 0;

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice($product)
    {
        return $this->price;
    }

    public function setAdTag($adTag)
    {
        $this->adTag = $adTag;
    }

    public function getAdTag($adTag)
    {
        return $this->adTag;
    }
}
<?php

final class AdServer
{
    private $floorPrice = 0;

    public function setFloorPrice($floorPrice)
    {
        $this->floorPrice = $floorPrice;
    }

    public function adSelect($bidRequest)
    {
        if($bidRequest->price >= $this->floorPrice){
            return $bidRequest->adTag;
        }else{
            return '';
        }
    }
}
<?php

namespace App\Interfaces;

interface PriceValidatorInterface {
    public function validatePriceChange($model, $newPrice);
}
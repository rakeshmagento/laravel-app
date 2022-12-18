<?php

namespace App;


class Price
{
    public $original;

    public $final;

    public $discount_percentage;

    public $currency;

    /**
     * Initilization
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \App\ValueObjects\Address
    */
    public function __construct($original, $final, $discountPercentage, $currency=null){
        $this->original = $original;
        $this->final = $final;
        $this->discount_percentage = $discountPercentage;
        $this->currency = "EUR";
    }
}

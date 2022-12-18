<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\Price;

class PriceCast implements CastsAttributes
{

   /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \App\ValueObjects\Address
     */
    public function get($model, $key, $value, $attributes)
    {
        $finalPrice   = $attributes['price'];
        $categoryDiscountApplied = $productSkuDiscountApplied = false;
        $discountApplied = $discountPercentage = $discountPercentageCategory = $discountPercentageSku = $categoryDisountFinalPrice = $productSkuDiscountFinalPrice = null;

        //Category based discount
        if($attributes['category'] == 'boots'){
            $categoryDisountFinalPrice = $attributes['price'] - (($attributes['price'] * 30)/100);
            $categoryDiscountApplied   = true;
            $discountPercentageCategory = "30%";
        }
        //Product sku based discount
        if($attributes['sku'] == '000003'){
            $productSkuDiscountFinalPrice = $attributes['price'] - (($attributes['price'] * 15)/100);
            $productSkuDiscountApplied    = true;
            $discountPercentageSku = "15%";
        }
        //Calculate finaPrice and final discountPercentage
        if($productSkuDiscountApplied && $categoryDiscountApplied){
            $finalPrice = min([$categoryDisountFinalPrice, $productSkuDiscountFinalPrice]);
            $discountPercentage = max([$discountPercentageCategory, $discountPercentageSku]);
        }else if($categoryDiscountApplied){
            $finalPrice = $categoryDisountFinalPrice;
            $discountPercentage = $discountPercentageCategory;
        }else if($productSkuDiscountApplied){
            $finalPrice = $productSkuDiscountFinalPrice;
            $discountPercentage = $discountPercentageSku;
        }

        return new Price(
            $attributes['price'],
            $finalPrice,
            $discountPercentage
        );
    }
 
    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  \App\ValueObjects\Address  $value
     * @param  array  $attributes
     * @return array
     */
    public function set($model, $key, $value, $attributes)
    {
       return [
            'price' => $value->price
       ];
    }
}

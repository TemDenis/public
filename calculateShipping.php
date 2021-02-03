<?php

class Product {
    private $price;
    private $weight;
    
    public function __construct($price, $weight) {
        $this->weight = $weight;
        $this->price  = $price;
    } 
    
    function getWeight(){
        return $this->weight;
    }
    function getPrice(){
        return $this->price;
    }
}

class Shipping {
    private $totalShipping;
    
    public function calculateTotalShipping($weight, $pricePerKilogram) {
        return $weight * $pricePerKilogram;
    }
}
$pricePerKilogram = 5;

$product = new Product(5, 1);
$product1 = new Product(6, 4);
$product3 = new Product(4, 4);

$shipping = new Shipping();
$totalShippingPrice =  $shipping->calculateTotalShipping($product->getWeight(), $pricePerKilogram);
 
var_dump($totalShippingPrice);

 


//  function calculateShipping($productWeight, $pricePerKilogram, $hasFreeShipping){
//   if(!$hasFreeShipping) {
//      return $productWeight * $pricePerKilogram;
//      }
//  }
//
//  $products[1]['weight'] = 1;
//  $products[1]['price'] = 5;
//  $products[1]['freeShipping'] = true;
//
//  $products[2]['weight'] = 2;
//  $products[2]['price'] = 3;
//  $products[2]['freeShipping'] = false;
//
//  $pricePerKilogram = 5;
//   
//$totalShippingPrice = 0;
//foreach($products as $product) {
//  $totalShippingPrice =  calculateShipping($product['weight'], $pricePerKilogram, $product['freeShipping']);
//}
//
//echo $totalShippingPrice;

?>
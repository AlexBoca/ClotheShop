<?php


namespace App\Repositories;


use App\Product;

class ProductRepository extends Repository
{
	protected $model = Product::class;
	protected $table = 'products';


}
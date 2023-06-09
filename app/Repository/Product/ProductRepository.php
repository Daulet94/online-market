<?php

namespace App\Repository\Product;


use App\Models\Product;
use App\Repository\Eloquent\BaseRepository;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}

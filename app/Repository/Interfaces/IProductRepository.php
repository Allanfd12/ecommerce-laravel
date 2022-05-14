<?php

namespace app\Repository\interfaces;

interface IProductRepository
{
    public function getSortedProducts(string $method, \Illuminate\Database\Eloquent\Builder $query = null);
    public function SearchProducts(string $search, int $category_id, \Illuminate\Database\Eloquent\Builder $query = null);
}
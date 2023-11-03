<?php

namespace App\Services;

use App\Models\Product;

class ProductService {

    public static function index($search)
    {
        $collection = Product::orderBy('id', 'desc');

        // if (!empty($search)) {
        //     if (!empty($search['company_name'])) {
        //         $collection->where('company_name', 'like', '%' . $search['company_name'] . '%');
        //     }
        //     if (!empty($search['abn'])) {
        //         $collection->where('abn', 'like', '%' . $search['abn'] . '%');
        //     }
        //     if (!empty($search['stage'])) {
        //         $collection->WhereHas('providerStage', function ($query) use ($search) {
        //             $query->where('name', 'like', '%' . $search['stage'] . '%');
        //         });
        //     }
        // }
        $Products = $collection;
        return $Products;
    }

    public static function getById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

}
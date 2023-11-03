<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\RefineSearchService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    /**
     * Display a paginated list of products based on search criteria.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request): \Inertia\Response
    {
        // Get products using the ProductService based on request parameters.
        $products = ProductService::index($request->all());

        // Retrieve refined search data based on request parameters.
        $refineSearch = RefineSearchService::getByParameter($request->all());

        return Inertia::render('Product/Index', [
            'search' => $request->input('search', ''),
            'hasSearchFields' => !empty($refineSearch) ? $refineSearch : '', // Assuming $refineSearch is an array
            'Products' => ProductResource::collection($products->paginate(10)->withQueryString()),
        ]);
    }

    /**
     * Display a specific product by its ID.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function view(int $id): \Inertia\Response
    {
        // Get product by ID using the ProductService.
        $product = ProductService::getById($id);

        return Inertia::render('Product/Product', [
            'product' => $product,
        ]);
    }

    /**
     * Display the search product page.
     *
     * @return \Inertia\Response
     */
    public function searchProduct(): \Inertia\Response
    {
        return Inertia::render('SearchProduct', [
        ]);
    }
}

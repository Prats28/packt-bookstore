<?php

namespace App\Services;

use App\Models\RefineSearch;

/**
 * Class RefineSearchService.
 */
class RefineSearchService
{
    public static function create($request){
        $redirect_url = $request['redirect_url'];
        unset($request['redirect_url']);
        $parameters = http_build_query($request);
        return $data = [
            'redirect_url' => $redirect_url,
            'parameters' => $parameters,
        ];
    }

    public static function getByParameter($request){
        return http_build_query($request);
    }

}

<?php
namespace App\Http\Services;
use App\Http\Services\Helpers\Itunes;
use Cache;

class ItunesService
{
    public function search($search_key, $inputs)
    {
        $cache_key = md5(serialize(array_merge($inputs, ['search' => $search_key])));
        $value = Cache::remember($cache_key, 60, function () use ($search_key, $inputs) {
            return Itunes::search($search_key, $inputs);
        });
        $res = json_decode($value)->results;
        return $res;     
    }

    public function lookup($inputs)
    {

    }
}
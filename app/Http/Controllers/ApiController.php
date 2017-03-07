<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItunesSearchRequest;
use App\Http\Services\ItunesService;
use Cache;

class ApiController extends Controller
{
    public function search(ItunesSearchRequest $request, ItunesService $itunesService)
    {
    	return response()->json($itunesService->search( $request->search, $request->inputs() ));
    }
}

<?php

namespace Scouser03\MultiSelect\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultiSelectController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::table($request->get('table'))
            ->where($request->get('field'))
            ->delete();
        
        return response()->json([
            'success' => true
        ]);
    }
}
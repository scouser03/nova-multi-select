<?php

namespace Scouser03\MultiSelect\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Nova;

class MultiSelectController extends Controller
{

    public function update(Request $request)
    {

        $resourceClass = Nova::resourceForKey(request('resourceName'));

        $getModel = $resourceClass::$model::findOrFail($request->get('id'));

        $realtion = $request->get('attribute');

        $getModel->$realtion()->sync($request->get('ids'));

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy(Request $request)
    {
        DB::table($request->get('table'))
            ->where($request->get('field'))
            ->delete();
        
        return response()->json([
            'success' => true
        ]);
    }
}
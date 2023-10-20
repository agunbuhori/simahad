<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function list(string $code)
    {
        $parent = DB::table('regions')
            ->where('code', $code)
            ->first();

        if (!$parent) {
            abort(404);
        }

        $lengths = [2, 5, 8, 13];
        $codeLength = strlen($code);
        $index = array_search($codeLength, $lengths);

        if ($index < count($lengths) - 1) {
            $children = DB::table('regions')
                ->whereRaw("LEFT(code, $codeLength) = ? AND LENGTH(code) = ?", [$code, $lengths[$index + 1]])
                ->get();

            $parent->children = $children;
        }

        return $parent;
    }
}

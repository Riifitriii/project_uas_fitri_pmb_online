<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return response()->json($prodi);
    }

    public function show($id)
    {
        $prodi = Prodi::find($id);

        if (!$prodi) {
            return response()->json(['message' => 'Prodi not found'], 404);
        }

        return response()->json($prodi);
    }
}
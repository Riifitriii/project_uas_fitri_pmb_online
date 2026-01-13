<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return response()->json($dosen);
    }

    public function show($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        return response()->json($dosen);
    }
}
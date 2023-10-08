<?php

namespace App\Http\Controllers\PracownicyKontroler;

use App\Models\Pracownicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PracownicyKontroler extends Controller
{
    public function index()
    {
        $pracownicy = Pracownicy::all();
        return response()->json($pracownicy);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $pracownik = Pracownicy::create($data);
        return response()->json($pracownik, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $pracownik = Pracownicy::find($id);

        if (!$pracownik) {
            return response()->json(['message' => 'Pracownik nie znaleziony'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($pracownik);
    }

    public function update(Request $request, $id)
    {
        $pracownik = Pracownicy::find($id);

        if (!$pracownik) {
            return response()->json(['message' => 'Pracownik nie znaleziony'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->all();
        $pracownik->update($data);

        return response()->json($pracownik);
    }

    public function destroy($id)
    {
        $pracownik = Pracownicy::find($id);

        if (!$pracownik) {
            return response()->json(['message' => 'Pracownik nie znaleziony'], Response::HTTP_NOT_FOUND);
        }

        $pracownik->delete();

        return response()->json(['message' => 'Pracownik usunięty'], Response::HTTP_NO_CONTENT);
    }
}

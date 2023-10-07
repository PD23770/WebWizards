<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

class PracownicyKontroler extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Imię' => 'required',
            'Nazwisko' => 'required',
            'Nazwa firmy' => 'required',
            'E-mail' => 'required|email|unique:employees',
            'Numer telefonu' => 'required',
            'Preferencje żywieniowe' => 'required',
        ]);

        $employee = Employee::create($request->all());

        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Imię' => 'required',
            'Nazwisko' => 'required',
            'Nazwa firmy' => 'required',
            'E-mail' => 'required|email|unique:employees,email,'.$id,
            'Numer telefonu' => 'required',
            'Preferencje żywieniowe' => 'required',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //GET
    //Tampil Data
    public function index()
    {
        //Mengeluarkan Data Semua
        $person = Person::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Ditemukan',
            'data' => $person
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

     //http://127.0.0.1:8000/api/person  (Ini API Key'nya)
     //POST
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validasi error',
                'errors' => $validator->errors()
            ],422);
        }

        $person = Person::create($request->all());
        return response()->json([
            'status' => 'true',
            'message' => 'Data berhasil dimasukkan',
            'data' => $person
        ],201);
    }

    /**
     * Display the specified resource.
     */
    //GET
    public function show(string $id)
    {
         //Mengeluarkan Data by id
         $person = Person::findOrFail($id);
         return response()->json([
             'status' => true,
             'message' => 'Data Berhasil Ditemukan',
             'data' => $person
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

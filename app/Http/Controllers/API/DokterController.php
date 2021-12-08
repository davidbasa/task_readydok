<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Relasi;
use Illuminate\Support\Facades\DB;


class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::all();
        return response()->json($dokter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required|max:255'
        ]);

        $newDokter = new Dokter([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
        ]);
        
        $newDokter->save();
        
        return response()->json(['created' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokter = DB::table('dokters')
                            ->where('id', $id)
                            ->get();
        if(count($dokter)==0){
            return response()->json(['message' => 'Doctor Not Found'], 200);
        }

        $dokter = Dokter::find($id);
        return response()->json($dokter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required|max:255'
        ]);
        
        $dokter->name = $request->get('name');
        $dokter->email = $request->get('email');
        $dokter->phone = $request->get('phone');
        $dokter->address = $request->get('address');

        
        $dokter->save();
        
        return response()->json(['updated' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = DB::table('dokters')
                            ->where('id', $id)
                            ->get();
        if(count($dokter)==0){
            return response()->json(['message' => 'Doctor Not Found'], 200);
        }

        $relasi = DB::table('relasis')
                            ->where('klinik_id', $id)
                            ->delete();        

        $dokter = Dokter::find($id);
        $dokter->delete();
        
        return response()->json(['deleted' => true,]);
    }
}

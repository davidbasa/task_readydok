<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Relasi;
use App\Models\Dokter;
use App\Models\Klinik;
use Illuminate\Support\Facades\DB;


class RelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relasi = Relasi::all();
        return response()->json($relasi);
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
            'dokter_id' => 'required',
            'klinik_id' => 'required',
        ]);

        $dokter = Dokter::findOrFail($request->get('dokter_id'));
        $klinik = Klinik::findOrFail($request->get('klinik_id'));

        $relasi = DB::table('relasis')
                            ->where('dokter_id', $request->get('dokter_id'))
                            ->where('klinik_id', $request->get('klinik_id'))
                            ->get();



        if(count($relasi)!=0){
            return response()->json(['message' => 'Data Already Exist'], 200);
        }


        $newRelasi = new Relasi([
            'dokter_id' => $request->get('dokter_id'),
            'klinik_id' => $request->get('klinik_id'),
        ]);
        
        $newRelasi->save();
        
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
        $hubungan = DB::table('relasis')
                            ->where('id', $id)
                            ->get();

        if(count($hubungan)==0){
            return response()->json(['message' => 'Relation Not Found'], 200);
        }
        $relasi = Relasi::findOrFail($id);
        return response()->json($relasi);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relasi = Relasi::findOrFail($id);
        $relasi->delete();
        
        return response()->json(['deleted' => true,]);
    }
}

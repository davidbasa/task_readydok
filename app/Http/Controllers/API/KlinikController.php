<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klinik;
use App\Models\Relasi;
use Illuminate\Support\Facades\DB;


class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klinik = Klinik::all();
        return response()->json($klinik);
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
            'description' => 'required|max:255'
        ]);
    
        $newKlinik = new Klinik([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        $newKlinik->save();
        
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

        $relasi = DB::table('kliniks')
                            ->where('id', $id)
                            ->get();
        if(count($relasi)==0){
            return response()->json(['message' => 'Clinic Not Found'], 200);
        }

        $klinik = Klinik::find($id);
        return response()->json($klinik);
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
        $klinik = Klinik::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $klinik->name = $request->get('name');
        $klinik->description = $request->get('description');
        
        $klinik->save();
        
        return response()->json(['updated' => true,]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klinik = DB::table('kliniks')
                            ->where('id', $id)
                            ->get();
        if(count($klinik)==0){
            return response()->json(['message' => 'Clinic Not Found'], 200);
        }

        $relasi = DB::table('relasis')
                            ->where('klinik_id', $id)
                            ->delete();        
        
        $klinik = Klinik::find($id);
        $klinik->delete();
        
        return response()->json(['deleted' => true,]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Resources\Tache as ResourcesTache;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ResourcesTache::collection(Tache::orderByDesc('created_at')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Tache::create($request->all())) {
           
            return response()->json([
                'success'=>'vous avez ajouté une nouvelle tache'
            ],200);
            
        };
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show(Tache $tach)
    {
        //
        return new ResourcesTache($tach) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tache $tach)
    {
        //
        if ($tach->update($request->all())) {
            
            return response()->json([

                'success'=>'vous avez modifier la tache'

            ],200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tach)
    {
        //
       
        if ($tach->delete()) {
            return response()->json([

                'success'=>'la tache à été supprimer avec succés'
            ],200);
        }
    }
}

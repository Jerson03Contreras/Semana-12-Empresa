<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PersonaSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\Category;
use App\Http\Requests\CreatePersonaRequest;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::orderBy('nPerCodigo','asc')->paginate(3);
        return view('personas',compact('personas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create',[
            'persona'=>new Persona,
            'categories' =>Category::pluck('name','id')
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePersonaRequest $request)
    {
        $persona = new Persona($request->validated());
        $persona->image = $request->file('image')->store('images');
        $persona->save();

        $image = Image::make(storage::get($persona->image))
                ->widen(600)
                ->limitColors(255)
                ->encode();

        Storage::put($persona->image, (string) $image);
        PersonaSaved::dispatch($persona);

        return redirect()->route('personas');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $nPerCodigo)
    {
        $persona = Persona::where('nPerCodigo', $nPerCodigo)->first();
        return view('show', [
            'persona' => $persona
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $nPerCodigo)
    {
        return view('editar',[
            'persona'=>$nPerCodigo,
            'categories' => Category::pluck('name','id')
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Persona $nPerCodigo, CreatePersonaRequest $request)

    {
        if($request->hasFile('image')){
            Storage::delete($nPerCodigo->image);
            $nPerCodigo->fill($request->validated());
            $nPerCodigo->image = $request->file('image')->store('images');
            $nPerCodigo->save();

            $image = Image::make(storage::get($nPerCodigo->image))
                    ->widen(600)
                    ->limitColors(255)
                    ->encode();

            Storage::put($nPerCodigo->image, (string) $image);
            PersonaSaved::dispatch($nPerCodigo);

            }else{
                $nPerCodigo->update(array_filter($request->validated()));
        }

        return redirect()->route('personas.show',$nPerCodigo);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $nPerCodigo)
    {
        Storage::delete($nPerCodigo->image);
        $nPerCodigo->delete();

        return redirect()->route('personas');//
    }
}

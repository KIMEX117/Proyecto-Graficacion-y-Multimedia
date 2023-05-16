<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\User;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $input = [
            'user_id' => 2,
            'title' => 'Demo Title',
            'data' => [
                '1' => 'One',
                '2' => 'Two',
                '3' => 'Three'
            ],
        ];
  
        $design = Design::create($input);
  
        dd($design->data); */

        //SIRVE PERO LO COMENTE POR MIENTRAS PORQUE TRAE TODOS LOS REGISTROS SIN FILTRAR POR USUARIO
        //$designs = Design::all();

        $designs = Design::where('user_id', auth()->id())->get();

        //SIRVE PERO LO COMENTE PARA PROBAR CON LA VISTA HOME
        /* return view('designs.index', compact('designs')); */

        return view('users.home', compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo $request->user_id;
        echo $request->title;
        echo $request->data;
        $prueba = json_decode($request->data);
        echo "asdasdasdasdasd\ndasdasd";
        var_dump($prueba);

        $design = Design::create($request->all());
        $design->save();

        $id = $design->id;
        //echo "Nuevo ID: ".$nuevo_id;
        return redirect()->route('design.edit', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $design = Design::find($id);
        return view('designs.edit', ['design' => $design]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $design = Design::where('id',$request->id)->first();
        if($design){
            $design->update($request->all());
            return redirect()->back()->with('success', 'Actualización completada satisfactoriamente.');
        }
        return redirect()->back()->with('error', 'Los datos no se pudieron actualizar, datos incorrectos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $design = Design::find($id);
        if ($design) {
            $design->delete();
            return redirect()->back()->with('success', 'Se ha eliminado el diseño: '.$design->title.'.');
        }
        return redirect()->back()->with('error', 'No fue posible eliminar el diseño.');
    }
}

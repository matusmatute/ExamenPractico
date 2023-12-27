<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Función para obtener todas las tasks creadas
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //*Función para crear nuevas tasks

        $Task = new Task;
        $Task->company_id = $request->company_id;
        $Task->name = $request->name;
        $Task->description = $request->description;
        $Task->user_id = $request->user_id;
        //& Se guardan los datos con SAVE
        $Task->save();

        //* Cargar la empresa y las tareas relacionadas
        $Task->load('Companies');

        //**Retornamos un json con los datos especificos que deseemos mostrar 
        $Task->load('Companies');
        $Task->load('user');
        return response()->json([
            'id' => $Task->id,
            'name' => $Task->name,
            'name user' => $Task->user->name,
            'description' => $Task->description,
            'Company' => [
                'id' => $Task->company_id,
                'name' => $Task->companies->name,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Task::find($id);
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

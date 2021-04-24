<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();

        $res = [
            "status" => "OK",
            "message" => "Lista de Personas",
            "code" => 1000,
            "data" => $persons
        ];

        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonPerson = $request->json()->all();

        $person = new Person($jsonPerson);

        // $person->firstName = $jsonPerson['firstName'];
        // $person->lastName = $jsonPerson['lastName'];
        // $person->documentNumber = $jsonPerson['documentNumber'];
        // $person->country = $jsonPerson['country'];
        // $person->city = $jsonPerson['city'];
        // $person->street = $jsonPerson['street'];
        // $person->number = $jsonPerson['number'];
        // $person->single = $jsonPerson['single'];

        $person->save();

        $res = [
            "status" => "OK",
            "message" => "Persona Creada",
            "code" => 1003,
            "data" => $person
        ];

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        if(isset($person)){
            $res = [
                "status" => "OK",
                "message" => "Obteniendo persona por id " . $id,
                "code" => 1001,
                "data" => $person
            ];
        } else {
            $res = [
                "status" => "Failed",
                "message" => "No se encontró persona por id " . $id,
                "code" => 1011,
                "data" => $person
            ];
        }

        return $res;
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
        $person = Person::find($id);

        if(isset($person)){
            $person->update($request->json()->all());

            $res = [
                "status" => "OK", 
                "code" => 1005,
                "message" => "Persona actualizada"
            ];
        } else {
            $res = [
                "status" => "Failed", 
                "code" => 1015,
                "message" => "No se encontró persona a actualizar"
            ];
        }

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);

        if(isset($person)){
            $person->delete();

            $res = [
                "status" => "OK", 
                "code" => 1004,
                "message" => "Persona eliminada"
            ];
        } else {
            $res = [
                "status" => "Failed", 
                "code" => 1014,
                "message" => "No se encontró persona a eliminar"
            ];
        }

        return $res;
    }
}

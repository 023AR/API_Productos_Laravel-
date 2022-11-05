<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function index()
    {
        // listar
        $listaCarrito = DB::select('select * from carrito');
        return response()->json($listaCarrito, 200);
    }


    public function store(Request $request)
    {
        // guardar o capturar datos
        //capturamos los datos enviados
        $id = $request->id;
        $nombre = $request->nombre;
        $cantidad = $request->cantidad;
        $precio = $request->precio;
        $detalle = $request->detalle;
        // guardamos en la base de datos
        DB::insert("INSERT INTO productos (nombre, cantidad, precio, detalle) VALUES ('$nombre', $cantidad, $precio, '$detalle')");
        return response()->json(['mensaje' => 'Producto enviado'], 201);
    }


    public function show($id)
    {
        // mostrar datos
    }


    public function update(Request $request, $id)
    {
        // Actualizar o modificar
    }

    public function destroy($id)
    {
        // Eliminar dato
        DB::delete('delete from carrtio where id = $id');
        return response()->json(['mensaje' => 'Producto eliminado'], 200);
    }
}

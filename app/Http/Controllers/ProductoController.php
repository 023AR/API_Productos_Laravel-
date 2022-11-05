<?php

namespace App\Http\Controllers;

// nos ayuda con la BASE DE DATOS
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProductoController extends Controller
{

    public function index()
    {
        // listar
        $listaProductos = DB::select('select * from productos');
        return response()->json($listaProductos, 200);
    }


    public function store(Request $request)
    {
        //capturamos los datos enviados
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
        // mostrar
        $producto = DB::select("select * from productos where id = $id limit 1");
        return response()->json($producto, 200);
    }

    public function update(Request $request, $id)
    {
        // modificar
        $nombre = $request->nombre;
        $cantidad = $request->cantidad;
        $precio = $request->precio;
        $detalle = $request->detalle;
        // actualizamos en la base de datos
        $respuesta = DB::update("update productos set nombre='$nombre', cantidad=$cantidad, precio=$precio, detalle='$detalle' where id=$id");
        return response()->json(['mensaje' => 'Producto Actualizado'], 200);
    }


    public function destroy($id)
    {
        //eliminar
        DB::delete('delete from productos where id = $id');
        return response()->json(['mensaje' => 'Producto eliminado'], 200);
    }
}

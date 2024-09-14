<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::leftJoin('users', 'users.id', '=', 'items.user_id')
            ->select('items.id', 'items.nombre', 'items.cantidad', 'items.precio', 'items.descripcion', 'users.name', 'items.user_id')
            ->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $item = Item::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('items.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            return redirect()->route('items.index')->with('error', 'No tienes los permisos para poder modificar este producto.');
        }

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            return redirect()->route('items.index')->with('error', 'No tienes los permisos para poder modificar este producto.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $item->update($request->only(['nombre', 'descripcion', 'cantidad', 'precio']));
        return redirect()->route('items.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            return redirect()->route('items.index')->with('error', 'No tienes los permisos para poder eliminar este producto.');
        }

        $item->delete();
        return redirect()->route('items.index')->with('success', 'Producto eliminado exitosamente.');
    }
}

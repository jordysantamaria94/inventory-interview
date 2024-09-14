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
        $items = Item::leftJoin('users', 'users.id', '=', 'items.user_id')->where('user_id', Auth::id())->get();
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

        return redirect()->route('items.index')->with('success', 'Item creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //$this->authorize('view', $item);
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //$this->authorize('update', $item);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //$this->authorize('update', $item);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $item->update($request->only(['nombre', 'descripcion', 'cantidad', 'precio']));
        return redirect()->route('items.index')->with('success', 'Item actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //$this->authorize('delete', $item);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item eliminado exitosamente.');
    }
}

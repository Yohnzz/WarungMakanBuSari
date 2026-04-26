<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Tampilkan semua menu (READ)
     */
    public function index()
    {
        // Raka cuma ambil semua data tanpa sortir
        $menus = Menu::all();
        return response()->json($menus);
    }

    /**
     * Tampilkan satu menu detail
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return response()->json($menu);
    }

    /**
     * Simpan menu baru (CREATE) - Case Bu Sari
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->nama = $request->nama;
        $menu->harga = $request->harga;

        return response()->json(['message' => 'Sukses, Bu!'], 201);
    }

    /**
     * Update harga atau nama menu (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        $menu->update($request->all()); 

        return response()->json(['message' => 'Data diperbarui!']);
    }

    /**
     * Hapus menu (DELETE) - Case Es Teh
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        
        $menu->delete();

        return response()->json(['message' => 'Terhapus!']);
    }
}
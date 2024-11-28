<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('category')->get(); // Memuat menu beserta kategori
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('menus.create', compact('categories'));
    }

    public function dashboard()
{
    $menus = Menu::with('category')->get(); // Ambil semua menu dengan relasi kategori
    return view('dashboard', compact('menus')); // Kirim data ke view dashboard
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
    ]);

    Menu::create($request->only('name', 'description', 'price', 'category_id'));

    // Redirect ke dashboard setelah berhasil menyimpan
    return redirect()->route('dashboard')->with('success', 'Menu berhasil dibuat.');
}

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $menu->update($request->only('name', 'description', 'price', 'category_id'));

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}

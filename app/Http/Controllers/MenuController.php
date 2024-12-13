<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('category')->get(); // Memuat menu beserta kategori
        return view('dashboard', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|integer|min:0',
            'category_id' => 'required_if:new_category,null|exists:categories,id',
            'new_category' => 'nullable|string|max:255',
        ]);

        // Simpan kategori baru jika dipilih
        if ($request->category_id === 'add-new' && $request->new_category) {
            $category = Category::create([
                'categoryname' => $request->new_category,
            ]);
            $request->merge(['category_id' => $category->id]);
        }

        // Simpan data menu ke database
        Log::info($request->all());
        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('home', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:255',
        ]);

        // Simpan kategori baru jika diisi
        if ($request->filled('new_category')) {
            $category = Category::create(['categoryname' => $request->new_category]); // Menggunakan kolom 'categoryname'
            $request->merge(['category_id' => $category->id]);
        }

        // Validasi ulang jika kategori tidak diisi
        if (!$request->filled('category_id')) {
            return redirect()->back()->withErrors(['category_id' => 'Kategori harus dipilih atau ditambahkan.']);
        }

        // Update menu
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('dashboard')->with('success', 'Menu berhasil dihapus.');
    }

    /**
     * Dashboard view with menus.
     */
    public function dashboard()
    {
        $menus = Menu::with('category')->get(); // Ambil semua menu dengan relasi kategori
        return view('dashboard', compact('menus')); // Kirim data ke view dashboard
    }
}

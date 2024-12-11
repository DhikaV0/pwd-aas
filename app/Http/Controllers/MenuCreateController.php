<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class MenuCreateController extends Controller
{
    /**
     * Show the form for creating a new menu.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori dari database
        return view('create', compact('categories')); // Kirim data kategori ke view
    }

    /**
     * Store a newly created menu in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:255',
        ]);

        // Simpan kategori baru jika ada input
        if ($request->filled('new_category')) {
            $category = Category::create(['categoryname' => $request->new_category]);
            $request->merge(['category_id' => $category->id]);
        }

        // Simpan menu ke database
        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }
}

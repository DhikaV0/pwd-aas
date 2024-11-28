<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relasi ke model Menu (One-to-Many).
     * Satu kategori bisa memiliki banyak menu.
     */
    public function menus()
    {
        return $this->hasMany(Menu::class); // Relasi dengan model Menu
    }
}

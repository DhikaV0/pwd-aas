<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = ['menu_id', 'quantity', 'total_price'];

    /**
     * Relasi ke model Menu (Many-to-One).
     * Satu order hanya terkait dengan satu menu.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class); // Relasi dengan model Menu
    }
}

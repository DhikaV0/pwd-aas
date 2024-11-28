<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * Properti yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'name',        // Nama menu
        'description', // Deskripsi menu
        'price',       // Harga menu
        'category_id', // ID kategori
    ];

    /**
     * Relasi ke model Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke model Order (opsional untuk pemesanan).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Accessor untuk harga terformat dalam mata uang.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Scope Query untuk Filter berdasarkan kategori.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Accessor untuk mendapatkan deskripsi singkat (jika panjang).
     *
     * @return string
     */
    public function getShortDescriptionAttribute()
    {
        return strlen($this->description) > 50
            ? substr($this->description, 0, 50) . '...'
            : $this->description;
    }

    /**
     * Accessor untuk nama dengan huruf kapital pada setiap kata.
     *
     * @return string
     */
    public function getFormattedNameAttribute()
    {
        return ucwords($this->name);
    }
}

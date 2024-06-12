<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image_url',
        'description',
        'quantity',
        'price',
        'category_name',
    ];

    // Relasi ke model Category berdasarkan nama kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_name', 'name');
    }
}

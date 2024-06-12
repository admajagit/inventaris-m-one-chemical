<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi ke model Item
    public function items()
    {
        
        return $this->hasMany(Item::class, 'category_name', 'name');
    }
}


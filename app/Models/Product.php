<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'price',
        'user_id'
      
    ];

    public function orders()
    {
        return $this->hasMany(Payment::class)->where('payment_status', 'COMPLETED');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
    return $this->belongsTo(Category::class);
    }
}

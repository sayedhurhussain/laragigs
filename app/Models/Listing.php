<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        // dd($filters['tag']);
        // if this is not false
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' .request('tag'). '%');
        };

    }
}

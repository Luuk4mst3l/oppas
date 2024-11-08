<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start_date', 'end_date', 'locations', 'tags', 'description', 'hourly_rate'];

    protected $casts = [
        'tags' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'hourly_rate' => 'decimal:2'
    ];

    public function scopeFilter($query, array $filters) {
        //dd($filters['tag']);

        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

}
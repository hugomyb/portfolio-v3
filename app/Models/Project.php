<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'resume',
        'slug',
        'description',
        'url',
        'category_id',
        'thumbnail',
        'images',
        'date',
    ];

    protected $casts = [
        'images' => 'array',
        'date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

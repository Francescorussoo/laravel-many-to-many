<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'type_id', 'image'];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // fillable fields
    protected $fillable = ['title', 'description', 'date'];

    // attributes to be cast as date
    protected $casts = ['date' => 'date'];
}

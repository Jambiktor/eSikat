<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaries extends Model
{
    use HasFactory;

    protected $fillable = [
        'notion',
    ];
}
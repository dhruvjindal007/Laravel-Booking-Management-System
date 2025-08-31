<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebPage extends Model
{
    //
    use HasFactory;
    protected $table = 'webpages';
    protected $fillable = [
        'name',
        'slug',
        'html',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}

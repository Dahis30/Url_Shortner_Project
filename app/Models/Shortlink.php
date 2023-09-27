<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;
    protected $table = 'short_links';
 
    protected $fillable = ['link', 'code', 'visits_count'];
}

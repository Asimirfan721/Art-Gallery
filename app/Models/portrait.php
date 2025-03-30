<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portrait extends Model
{
    use HasFactory; // factory has to be used
    protected $fillable = ['title','company','location','website','email','description','tags']; // fillable fields are defined here
}

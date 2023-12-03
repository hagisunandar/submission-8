<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laravel_1 extends Model
{
    protected $fillabel = ['nama','alamat','nomorkontak'];
    protected $table = 'laravel_1';
    public $timestamps = false;

    use HasFactory;
}


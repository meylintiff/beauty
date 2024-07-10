<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPerbandingan extends Model
{
    use HasFactory;

    protected $table = 'perbandingan';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'kriteria', 'C1', 'C2', 'C3', 'C4', 'C5',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKriteria extends Model
{
    use HasFactory;
    protected $table = 'tipe_kriteria';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'tipe',
    ];
}

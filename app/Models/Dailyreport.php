<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailyreport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pos',
        'unit',
        'cat',
        'moder',
        'subj',
        'sub',
        'desc',
        'date',
        'ym',
        'y',
    ];
}

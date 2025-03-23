<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Promo extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'expired_at' => 'datetime',
    ];
    protected $fillable = ['code', 'discount', 'expired_at', 'active'];
}
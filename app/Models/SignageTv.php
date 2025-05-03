<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignageTv extends Model
{
    use HasFactory;

    protected $table = 'tbl_signage_tv';
    protected $primaryKey = 'sign_id';
    protected $keyType = 'string'; 

    public $incrementing = false;

    protected $fillable = [
        'sign_id',
        'tv',
        'brand',
        'descript',
        'remarks',
    ];
    public $timestamps = true;
}

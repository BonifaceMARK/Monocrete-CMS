<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignageLocation extends Model
{
    use HasFactory;

    protected $table = 'tbl_signage_location';

    protected $primaryKey = 'sign_id';  

    public $incrementing = false;  

    protected $keyType = 'string'; 
    protected $fillable = [
        'sign_id',
        'location',
        'department',
        'remarks',
    ];

    public $timestamps = true; 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signage extends Model
{
    use HasFactory;

    protected $table = 'tbl_signage';

    protected $primaryKey = 'sign_id';

    public $incrementing = false; 

    protected $keyType = 'string'; // If the primary key is not an integer, specify its type (e.g., string)

    protected $fillable = [
        'sign_id', // Include the primary key if you want to mass-assign it
        'tv',
        'location',
        'filename',
        'filetype',
        'filesize',
    ];

    public $timestamps = true;
}

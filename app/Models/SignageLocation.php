<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignageLocation extends Model
{
    use HasFactory;

    protected $table = 'tbl_signage_location';

    protected $primaryKey = 'location_id';  

    public $incrementing = false;  

    protected $keyType = 'string'; 
    protected $fillable = [
        'location_id',
        'location',
        'department',
        'remarks',
        'attach',
    ];

    public $timestamps = true; 

//     public function signage()
// {
//     return $this->belongsTo(Signage::class, 'sign_id', 'sign_id');
// }

}

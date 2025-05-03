<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignageTv extends Model
{
    use HasFactory;

    protected $table = 'tbl_signage_tv';
    protected $primaryKey = 'tv_id';
    protected $keyType = 'string'; 

    public $incrementing = false;

    protected $fillable = [
        'tv_id',
        'tv',
        'brand',
        'descript',
        'remarks',
        'attach',
    ];
    public $timestamps = true;

//     public function signage()
// {
//     return $this->belongsTo(Signage::class, 'sign_id', 'sign_id');
// }

}

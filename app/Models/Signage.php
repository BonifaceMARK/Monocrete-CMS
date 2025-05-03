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

    protected $keyType = 'string'; 

    protected $fillable = [
        'sign_id', 
        // 'tv',
        // 'location',
        'filename',
        'filetype',
        'filesize',
    ];

    public $timestamps = true;

//     public function location()
// {
//     return $this->hasOne(SignageLocation::class, 'sign_id', 'sign_id');
// }

// public function tv()
// {
//     return $this->hasOne(SignageTv::class, 'sign_id', 'sign_id');
// }

}

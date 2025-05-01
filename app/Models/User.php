<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tbl_user'; // your table
    protected $primaryKey = 'emp_id'; // <--- use emp_id here!
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    public $timestamps = false; // still manual timestamps unless you want otherwise

    protected $fillable = [
        'emp_fname',
        'emp_lname',
        'emp_user', 
        'emp_pass',
        'emp_email',
        'emp_contact_no',
        'emp_gender',
        'user_type',
        'user_status',
        'emp_sec_question',
        'emp_sec_answer',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'emp_pass',
    ];

    public function getAuthPassword()
    {
        return $this->emp_pass;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditUser extends Model
{
    protected $table="users";
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role',
    ];
}

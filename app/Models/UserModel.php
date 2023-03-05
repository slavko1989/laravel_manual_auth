<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user_models';

    protected  $fillable = ['name,email,password,profile'];
    use HasFactory;
}

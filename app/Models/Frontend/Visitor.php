<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Visitor extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'Parents_Name', 'email', 'Phone_Number', 'Class'];
}

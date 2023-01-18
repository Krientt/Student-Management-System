<?php

namespace App\Models\admin;

use App\Models\Teacher\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id', 'teacher_id', 'description', 'image', 'status', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

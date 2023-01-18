<?php

namespace App\Models\Teacher;

use App\Models\admin\Blog;
use App\Models\Frontend\Visitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id', 'terminal', 'blog1_id', 'marks1', 'blog2_id', 'marks2', 'blog3_id', 'marks3', 'blog4_id', 'marks4', 'blog5_id', 'marks5', 'remarks'];

    public function visitor()
    {
        return $this->hasOne(Visitor::class, 'id', 'visitor_id');
    }
    public function blog1()
    {
        return $this->belongsTo(Blog::class, 'blog1_id', 'id');
    }
    public function blog2()
    {
        return $this->belongsTo(Blog::class, 'blog2_id', 'id');
    }
    public function blog3()
    {
        return $this->belongsTo(Blog::class, 'blog3_id', 'id');
    }
    public function blog4()
    {
        return $this->belongsTo(Blog::class, 'blog4_id', 'id');
    }
    public function blog5()
    {
        return $this->belongsTo(Blog::class, 'blog5_id', 'id');
    }
}

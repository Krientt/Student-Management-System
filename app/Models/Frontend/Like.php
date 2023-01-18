<?php

namespace App\Models\Frontend;

use App\Models\admin\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'visitor_id', 'visitor_name'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id', 'id');
    }
}

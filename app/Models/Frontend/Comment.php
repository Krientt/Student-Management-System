<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'visitor_id', 'comment'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id', 'id');
    }
}

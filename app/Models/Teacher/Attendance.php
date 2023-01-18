<?php

namespace App\Models\Teacher;

use App\Models\Frontend\Visitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id', 'date', 'status ', 'in_time', 'out_time'];

    public function visitor()
    {
        return $this->hasOne(Visitor::class, 'id', 'visitor_id');
    }
}

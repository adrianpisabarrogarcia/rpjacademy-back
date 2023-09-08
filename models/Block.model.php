<?php

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'block';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id',
        'name',
        'sorting',
        'description',
        'image',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'order' => 'integer'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
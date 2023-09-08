<?php

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'institution';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id',
        'name',
        'logo',
        'description',
        'convenes',
        'certifies',
        'collaborate'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'convenes' => 'boolean',
        'certifies' => 'boolean',
        'collaborate' => 'boolean'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
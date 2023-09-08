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
        'description'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'convenes' => 'boolean',
        'certifies' => 'boolean',
        'collaborate' => 'boolean'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('convenes', 'certifies', 'collaborate', 'created_at', 'updated_at')
            ->as('institution_details'); // este es un alias opcional para los datos de la tabla pivot
    }
}
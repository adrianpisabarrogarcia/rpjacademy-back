<?php
namespace RPJAcademy\Models;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'slogan',
        'description',
        'duration',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'video',
        'dateStart',
        'dateFinish',
        'course',
        'workshop',
        'modality',
        'contact',
        'dateStartRegistration',
        'dateFinishRegistration'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'dateStart' => 'date',
        'dateFinish' => 'date',
        'course' => 'boolean',
        'workshop' => 'boolean',
        'dateStartRegistration' => 'date',
        'dateFinishRegistration' => 'date'
    ];

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function institutions()
    {
        return $this->belongsToMany(Institution::class)
            ->withPivot('convenes', 'certifies', 'collaborate', 'created_at', 'updated_at')
            ->as('course_details');  // este es un alias opcional para los datos de la tabla pivot
    }

}
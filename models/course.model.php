<?php
use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'imageUrl',
        'isAvailable',
        'category'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'isAvailable' => 'boolean',
        'price' => 'double' //with 2 decimals
    ];

}
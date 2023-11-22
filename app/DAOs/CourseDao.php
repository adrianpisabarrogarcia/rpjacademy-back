<?php
namespace RPJAcademy\DAOs;
use RPJAcademy\Interfaces\CourseDaoInterface;
use RPJAcademy\Models\Course;

class CourseDao implements CourseDaoInterface {
    public function add($entity)
    {
        // TODO: Implement add() method.
    }
    public function find($entity)
    {
        return Course::with('blocks', 'institutions')->find($entity->id);
    }
    public function findAll()
    {
        return Course::where("course", true)->get();
    }
    public function save($entity)
    {
        // TODO: Implement save() method.
    }
    public function delete($entity)
    {
        // TODO: Implement delete() method.
    }
}
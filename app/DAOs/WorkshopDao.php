<?php
namespace RPJAcademy\DAOs;
use RPJAcademy\Interfaces\CourseDaoInterface;
use RPJAcademy\Models\Course;

class WorkshopDao implements CourseDaoInterface {
    public function find($entity)
    {
        return Course::with('blocks', 'institutions')->find($entity->id);
    }
    public function findAll()
    {
        return Course::where("workshop", true)->get();
    }
    public function save($entity)
    {
        return $entity->save();
    }
    public function delete($entity)
    {
        return $entity->delete();
    }
}
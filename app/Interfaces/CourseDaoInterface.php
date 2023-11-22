<?php
namespace RPJAcademy\Interfaces;

interface CourseDaoInterface {
    public function find($entity);
    public function findAll();
    public function save($entity);
    public function delete($entity);
}
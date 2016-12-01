<?php
/**
 * Created by PhpStorm.
 * User: Eden Duong
 * Date: 10/11/2016
 * Time: 3:43 CH
 */
namespace Magestore\Student\Model;
/**
 * Class StudentRepository
 * @package Magestore\Student\Model
 */
class StudentRepository implements \Magestore\Student\Api\StudentRepositoryInterface {

    /**
     * @var ResourceModel\Student
     */
    protected $studentResource;

    /**
     * StudentRepository constructor.
     * @param ResourceModel\Student $studentResource
     */
    public function __construct(
        \Magestore\Student\Model\ResourceModel\Student $studentResource
    )
    {
        $this->studentResource = $studentResource;
    }

    /**
     * @param  \Magestore\Student\Api\Data\StudentInterface $student
     * @return \Magestore\Student\Api\Data\StudentInterface
     */
    public function save(\Magestore\Student\Api\Data\StudentInterface $student)
    {
        $this->studentResource->save($student);
        return $student;
    }
}
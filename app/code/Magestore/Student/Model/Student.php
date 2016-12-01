<?php
/**
 * Created by PhpStorm.
 * User: Eden Duong
 * Date: 10/11/2016
 * Time: 3:43 CH
 */
namespace Magestore\Student\Model;
class Student extends \Magento\Framework\Model\AbstractModel implements \Magestore\Student\Api\Data\StudentInterface {
    /**
     * @return mixed
     */

    const KEY_ID = 'id';
    const KEY_CLASS = 'class';
    const KEY_NAME = 'name';
    const KEY_UNIVERSITY = 'university';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Magestore\Student\Model\ResourceModel\Student');
    }


    public function getId(){
        return $this->getData(self::KEY_ID);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id){
        return $this->setData(self::KEY_ID, $id);
    }

    /**
     * @return mixed
     */
    public function getClass(){
        return $this->getData(self::KEY_CLASS);
    }

    /**
     * @param $class
     * @return mixed
     */
    public function setClass($class){
        return $this->setData(self::KEY_CLASS, $class);
    }

    /**
     * @return mixed
     */
    public function getName(){
        return $this->getData(self::KEY_NAME);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name){
        return $this->setData(self::KEY_NAME, $name);
    }

    /**
     * @return mixed
     */
    public function getUniversity(){
        return $this->getData(self::KEY_UNIVERSITY);
    }

    /**
     * @param $university
     * @return mixed
     */
    public function setUniversity($university){
        return $this->setData(self::KEY_UNIVERSITY, $university);
    }
}
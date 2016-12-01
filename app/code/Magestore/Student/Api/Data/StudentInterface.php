<?php
/**
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Magestore\Student\Api\Data;

/**
 * @api
 */
/**
 * Interface StudentInterface
 * @package Magestore\Student\Api\Data
 */
interface StudentInterface
{
    /**
     * Get Id
     *
     * @return int
     */
    public function getId();

    /**
     * Set Id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Class
     *
     * @return string
     */
    public function getClass();

    /**
     * Set Class
     *
     * @param string $class
     * @return $this
     */
    public function setClass($class);

    /**
     * Get Name
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get University
     * @return string
     */
    public function getUniversity();

    /**
     * Set University
     *
     * @param string $university
     * @return $this
     */
    public function setUniversity($university);
}

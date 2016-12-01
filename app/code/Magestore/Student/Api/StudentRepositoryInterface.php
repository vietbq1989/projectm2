<?php
/**
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Magestore\Student\Api;

/**
 * Interface StudentInterface
 * @package Magestore\Student\Api\Data
 */
interface StudentRepositoryInterface
{
    /**
     * @param \Magestore\Student\Api\Data\StudentInterface $student
     * @return \Magestore\Student\Api\Data\StudentInterface
     */
    public function save(\Magestore\Student\Api\Data\StudentInterface $student);
}

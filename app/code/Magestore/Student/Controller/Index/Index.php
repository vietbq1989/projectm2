<?php
/**
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Magestore\Student\Controller\Index;
/**
 * Class Index
 * @package Magestore\Student\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magestore\Student\Api\StudentRepositoryInterface
     */
    protected $studentRepository;
    /**
     * @var \Magestore\Student\Api\Data\StudentInterfaceFactory
     */
    protected $studentFactory;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magestore\Student\Api\Data\StudentInterfaceFactory $studentFactory
     * @param \Magestore\Student\Api\StudentRepositoryInterface $studentRepository
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magestore\Student\Api\Data\StudentInterfaceFactory $studentFactory,
        \Magestore\Student\Api\StudentRepositoryInterface $studentRepository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->studentRepository = $studentRepository;
        $this->studentFactory = $studentFactory;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     *
     */
    public function execute() {
        $resultLayout = $this->_resultPageFactory->create();
        return $resultLayout;
    }
}

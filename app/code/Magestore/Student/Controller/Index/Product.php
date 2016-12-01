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
class Product extends \Magento\Framework\App\Action\Action
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
     * @var \Magento\Checkout\Helper\Cart
     */
    protected $_cartHelper;
    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

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
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Checkout\Helper\Cart $cartHelper,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        \Magento\Framework\Data\Form\FormKey $formKey
    ) {
        $this->studentRepository = $studentRepository;
        $this->studentFactory = $studentFactory;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_cartHelper = $cartHelper;
        $this->urlHelper = $urlHelper;
        $this->formKey = $formKey;
        parent::__construct($context);
    }

    /**
     *
     */
    public function execute() {
        if($this->getRequest()->isXmlHttpRequest()){
            // ajax
        } else {
            $this->_redirect('student');
        }

        // get 10 simple product
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $productFactory = $objectManager->create('Magento\Catalog\Model\ProductFactory');
        $collection = $productCollection->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('type_id', \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
        $collection->getSelect()->order('created_at', \Magento\Framework\DB\Select::SQL_DESC);
        $collection->getSelect()->limit(10);
        $productArray = array();
        foreach ($collection as $product) {
            $productData = $productFactory->create()->load($product->getId())->getData();
            $productData['additional'] =  $this->getAddToCartPostParams($product);
            $productData['additional']['formkey'] = $this->formKey->getFormKey();
            $productArray[] = $productData;
        }

        //$result['product'] = $productArray;
        $this->getResponse()->setBody(json_encode($productArray));
    }

    /**
     * Generate content to log file debug.log By Hattetek.Com
     *
     * @param  $message string|array
     * @return void
     */
    function xlog($message = 'null')
    {
        $log = print_r($message, true);
        \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Psr\Log\LoggerInterface')
            ->debug($log);
    }

    /**
     * Retrieve url for add product to cart
     * Will return product view page URL if product has required options
     *
     * @param \Magento\Catalog\Model\Product $product
     * @param array $additional
     * @return string
     */
    public function getAddToCartUrl($product, $additional = [])
    {
        return $this->_cartHelper->getAddUrl($product, $additional);
    }

    public function getAddToCartPostParams(\Magento\Catalog\Model\Product $product)
    {
        $url = $this->getAddToCartUrl($product);
        return [
            'action' => $url,
            'data' => [
                'product' => $product->getEntityId(),
                \Magento\Framework\App\ActionInterface::PARAM_NAME_URL_ENCODED =>
                    $this->urlHelper->getEncodedUrl($url),
            ]
        ];
    }
}

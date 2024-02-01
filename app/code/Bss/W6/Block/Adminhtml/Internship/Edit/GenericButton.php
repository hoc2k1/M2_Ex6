<?php

namespace Bss\W6\Block\Adminhtml\Internship\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\UrlInterface;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var RequestInterface
     */
    protected $getRequest;

    /**
     * Constructor
     *
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->getRequest = $context->getRequest();
    }

    /**
     * Get Id request
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getRequest->getParam('id');
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}

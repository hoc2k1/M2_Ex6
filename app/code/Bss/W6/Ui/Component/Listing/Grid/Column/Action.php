<?php
//
//namespace Bss\W6\Ui\Component\Listing\Grid\Column;
//
//use Magento\Framework\View\Element\UiComponent\ContextInterface;
//use Magento\Framework\View\Element\UiComponentFactory;
//use Magento\Ui\Component\Listing\Columns\Column;
//use Magento\Framework\UrlInterface;
//
//class Action extends Column
//{
//    /** Url path */
//    const ROW_EDIT_URL = 'grid/grid/addrow';
//    /** @var UrlInterface */
//    protected $_urlBuilder;
//
//    /**
//     * @var string
//     */
//    private $_editUrl;
//
//    /**
//     * @param ContextInterface   $context
//     * @param UiComponentFactory $uiComponentFactory
//     * @param UrlInterface       $urlBuilder
//     * @param array              $components
//     * @param array              $data
//     * @param string             $editUrl
//     */
//    public function __construct(
//        ContextInterface $context,
//        UiComponentFactory $uiComponentFactory,
//        UrlInterface $urlBuilder,
//        array $components = [],
//        array $data = [],
//        $editUrl = self::ROW_EDIT_URL
//    )
//    {
//        $this->_urlBuilder = $urlBuilder;
//        $this->_editUrl = $editUrl;
//        parent::__construct($context, $uiComponentFactory, $components, $data);
//    }
//
//    /**
//     * Prepare Data Source.
//     *
//     * @param array $dataSource
//     *
//     * @return array
//     */
//    public function prepareDataSource(array $dataSource)
//    {
//        if (isset($dataSource['data']['items'])) {
//            foreach ($dataSource['data']['items'] as &$item) {
//                $name = $this->getData('name');
//                if (isset($item['entity_id'])) {
//                    $item[$name]['edit'] = [
//                        'href' => $this->_urlBuilder->getUrl(
//                            $this->_editUrl,
//                            ['id' => $item['entity_id']]
//                        ),
//                        'label' => __('Edit'),
//                    ];
//                }
//            }
//        }
//
//        return $dataSource;
//    }
//}


/**
 * Copyright &copy; Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Bss\W6\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Action extends Column
{
    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @var string
     */
    protected $_viewUrl;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param string $viewUrl
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface       $urlBuilder,
                           $viewUrl = '',
        array              $components = [],
        array              $data = []
    )
    {
        $this->_urlBuilder = $urlBuilder;
        $this->_viewUrl = $viewUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['view'] = [
                        'href' => $this->_urlBuilder->getUrl($this->_viewUrl, ['id' => $item['id']]),
                        'target' => '_blank',
                        'label' => __('Edit')
                    ];
                }
            }
        }
        return $dataSource;
    }
}

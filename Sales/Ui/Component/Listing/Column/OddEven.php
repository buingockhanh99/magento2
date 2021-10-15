<?php
/**
 * LoadOddEven
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Sales\Ui\Component\Listing\Column;


class OddEven extends \Magento\Ui\Component\Listing\Columns\Column
{

    protected $directorFactory;
    protected $urlBuilder;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []

    )
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as $key => $item) {
                if(isset($item['increment_id']))
                {
                    $idincrement = (int)$item['increment_id'];
                    if($idincrement %2 == 0){
                        $dataSource['data']['items'][$key]['oddeven'] = '<div style="background: #0af0fc; text-align: center "><h2 style="color: #3c763d"><b>SUCCESS</b></h2></div>';
                    }
                    else{
                        $dataSource['data']['items'][$key]['oddeven'] = '<div style="background: yellow ; text-align: center "><h2 style="color: red"><b>ERROR</b></h2></div>';
                    }
                }
            }
            return $dataSource;
        }
    }
}

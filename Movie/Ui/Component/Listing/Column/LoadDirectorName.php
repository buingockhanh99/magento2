<?php
/**
 * LoadDirectorName
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Ui\Component\Listing\Column;


class LoadDirectorName implements \Magento\Framework\Data\OptionSourceInterface
{


    protected $collectionFactory;
    protected $pageFactory;
    protected $directorFactory;


    public function __construct(
        \Magenest\Movie\Model\ResourceModel\Director\CollectionDirectorFactory $collectionFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magenest\Movie\Model\DirectorFactory $directorFactory


    )
    {
        $this->pageFactory = $pageFactory;
        $this->directorFactory = $directorFactory;
        $this->collectionFactory = $collectionFactory;


    }

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {

        $post = $this->collectionFactory->create();
        $options = [];


        foreach ($post as $item) {
            $options[] = [
                'value' => $item->getData('director_id'),
                'label' => $item->getData('name')
            ];
        }

        return $options;

    }


}

<?php
/**
 * EventSaveMovie
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Observer;


use Magento\Framework\Event\ObserverInterface;

class EventSaveMovie implements ObserverInterface
{
//    protected $directorFactory;
//
//
//    public function __construct(\Magenest\Movie\Model\DirectorFactory $directorFactory)
//    {
//        $this->directorFactory = $directorFactory;
//    }


    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data = $observer->getData('magenest_director');
        $string = $data->getData('name');
        $search = 'ping';
        $replace = 'pong';
        $results = str_replace($search,$replace,$string);


        $data->setData('name', $results);
//        $directorModel = $observer->getEvent()->getData('magenest_director');
//        $directorModel->setData('name', 'Magenest');
    }
}

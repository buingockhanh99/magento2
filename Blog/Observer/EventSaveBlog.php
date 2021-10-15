<?php
/**
 * EventSaveBlog
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Observer;


use Magento\Framework\App\Action\Context;
use Magento\Framework\Event\ObserverInterface;
use Magenest\Blog\Model\UrlFactory;

class EventSaveBlog implements ObserverInterface
{
    protected $getmessenger;
    protected $modelUrl;

    public function __construct(
        Context $context,
        UrlFactory $modelUrl
    )
    {
        $this->modelUrl = $modelUrl;
        $this->getmessenger = $context->getMessageManager();
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getData('request');
        $model = $observer->getData('model');
        $data = $observer->getData('data');
        $modelurl = $this->modelUrl->create()->load($request->getParam('id'));

        $id = $model->getData('id');
        $url_path = $data['url_rewrite'].'.html';

        $modelurl->setData('entity_id',$id);
        $modelurl->setData('redirect_type','302');
        $modelurl->setData('store_id','9');
        $modelurl->setData('entity_type','custom');
        $modelurl->setData('request_path',$url_path);
        $modelurl->setData('target_path','magenest_blog/blog/view/id/'.$id);

        $modelurl->save();
    }
}

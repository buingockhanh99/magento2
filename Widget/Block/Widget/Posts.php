<?php
/**
 * Posts
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Widget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Posts extends Template implements BlockInterface
{
    protected $_template = "widget/posts.phtml";
}

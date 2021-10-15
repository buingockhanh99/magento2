<?php
/**
 * BlogInterface
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Api\Data;


interface BlogInterface
{
    const ID = 'id' ;
    const AUTHOR_ID = 'author_id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const DESCRIPTION = 'description';
    const URL_REWRITE = 'url_rewrite';
    const STATUS = 'status';


    public function getId();

    public function setId($id);

    public function getAuthor_id();

    public function setAuthor_id($author_id);

    public function getTitle();

    public function setTitle($title);

    public function getContent();

    public function setContent($content);

    public function getDescription();

    public function setDescription($description);

    public function getUrl_rewrite();

    public function setUrl_rewrite($url_rewrite);

    public function getStatus();

    public function setStatus($status);


    public function getExtensionAttributes();


    public function setExtensionAttributes(
        \Magenest\Blog\Api\Data\BlogExtensionInterface $extensionAttributes
    );


}

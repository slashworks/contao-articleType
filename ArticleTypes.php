<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jrgregory
 * Date: 09.01.13
 * Time: 18:13
 * To change this template use File | Settings | File Templates.
 */

class ArticleTypes extends \Frontend
{
    public function changeTemplate($objTemplate)
    {

        if ($objTemplate->articleType == 'simple')
        {
            $objTemplate->setName('mod_article_simple');
        }
    }
}
<?php

/**
 * articleType for Contao Open Source CMS
 *
 * Copyright (C) 2013 Joe Ray Gregory
 *
 * @package articleType
 * @link    http://borowiakziehe.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

class ArticleTypes extends \Frontend
{
    public function changeTemplate($objTemplate)
    {
        if ($objTemplate->articleType != '' && $objTemplate->articleType != 'standard')
        {
            $objTemplate->setName('mod_article_'.$objTemplate->articleType);
        }
    }
}
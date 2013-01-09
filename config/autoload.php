<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package ArticleType
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ArticleTypes' => 'system/modules/articleType/ArticleTypes.php',
));

    /**
     * Register the templates
     */
TemplateLoader::addFiles(array
(
    'mod_article_simple'    => 'system/modules/articleType/templates'
));
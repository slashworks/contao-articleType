<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'] = array('articleType');
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = '{type},articleType,'.$GLOBALS['TL_DCA']['tl_article']['palettes']['default'];
$GLOBALS['TL_DCA']['tl_article']['palettes']['simple'] = '{type},articleType,articleContent;{expert_legend:hide},printable,cssID,space;{publish_legend},published';


$GLOBALS['TL_DCA']['tl_article']['fields']['articleType'] = array
 (
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['type'],
    'default'                 => 'text',
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'select',
    'options_callback'        => array('articleType', 'getArticleTypes'),
    'reference'               => &$GLOBALS['TL_LANG']['CTE'],
    'eval'                    => array('helpwizard'=>true, 'chosen'=>true, 'submitOnChange'=>true),
    'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['articleContent'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['articleContent'],
    'exclude'                 => true,
    'inputType'               => 'textarea',
    'search'                  => true,
    'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr'),
    'sql'                     => "text NULL"
);

class articleType extends Backend
{
    /**
     * Return all article elements as array
     * @return array
     */
    public function getArticleTypes()
    {
        $articleTypes = array();

        foreach ($GLOBALS['ArticleTypes'] as $k=>$v)
        {
            $articleTypes[] = $k;
        }

        return $articleTypes;
    }
}
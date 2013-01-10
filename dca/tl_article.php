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

$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'] = array('articleType');
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = '{type},articleType,'.$GLOBALS['TL_DCA']['tl_article']['palettes']['default'];
$GLOBALS['TL_DCA']['tl_article']['palettes']['content'] = '{type},articleType;{title_legend},title,alias,author;{layout_legend},inColumn,keywords;{articleContent},articleContent;{expert_legend:hide},printable,cssID,space;{publish_legend},published';


$GLOBALS['TL_DCA']['tl_article']['list']['label']['label_callback'] = array('articleType', 'addNewIcon');

$GLOBALS['TL_DCA']['tl_article']['fields']['articleType'] = array
 (
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['articleType'],
    'default'                 => 'text',
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'select',
    'options_callback'        => array('articleType', 'getArticleTypes'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_article']['types'],
    'eval'                    => array('chosen'=>true, 'submitOnChange'=>true),
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

    /**
     * Add an image to each page in the tree
     * @param array
     * @param string
     * @return string
     */
    public function addNewIcon($row, $label)
    {
        $time = time();
        $published = ($row['published'] && ($row['start'] == '' || $row['start'] < $time) && ($row['stop'] == '' || $row['stop'] > $time));
        $type = ($row['articleType'] == 'standard' || $row['articleType'] == '') ? '' : '-'.$row['articleType'];

        return '<a href="contao/main.php?do=feRedirect&amp;page='.$row['pid'].'&amp;article='.(($row['alias'] != '' && !$GLOBALS['TL_CONFIG']['disableAlias']) ? $row['alias'] : $row['id']).'" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['view']).'" target="_blank">'.$this->generateImage('articles'.$type.($published ? '' : '_').'.gif').'</a> '.$label;
    }
}
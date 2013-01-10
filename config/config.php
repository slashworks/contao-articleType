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

/**
 * Init hook to reparse templates if other types than default are selected
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('ArticleTypes', 'changeTemplate');

/**
 * Global array to store the article types
 */
$GLOBALS['ArticleTypes'] = array
(
    'standard' => 'Standard',
    'content' => 'Content'
);
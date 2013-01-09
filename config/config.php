<?php

$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('ArticleTypes', 'changeTemplate');


$GLOBALS['ArticleTypes'] = array
(
    'standard' => 'Standard',
    'simple' => 'Simple'
);
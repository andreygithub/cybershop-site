<?php
/**
 * @package cybershop-site
 * @subpackage build
 */
$templates = array();

$templates[1]= $modx->newObject('modTemplate');
$templates[1]->fromArray(array(
    'id' => 1,
    'templatename' => 'main',
    'description' => 'The main template for the design.',
    'content' => file_get_contents($sources['data'].'templates/template.main.tpl'),
),'',true,true);

$templates[2]= $modx->newObject('modTemplate');
$templates[2]->fromArray(array(
    'id' => 2,
    'templatename' => 'home',
    'description' => 'The template for home page.',
    'content' => file_get_contents($sources['data'].'templates/template.home.tpl'),
),'',true,true);

$templates[3]= $modx->newObject('modTemplate');
$templates[3]->fromArray(array(
    'id' => 3,
    'templatename' => 'catalog',
    'description' => 'The template for catalog page.',
    'content' => file_get_contents($sources['data'].'templates/template.catalog.tpl'),
),'',true,true);

$templates[4]= $modx->newObject('modTemplate');
$templates[4]->fromArray(array(
    'id' => 4,
    'templatename' => 'blog',
    'description' => 'The template for blog page.',
    'content' => file_get_contents($sources['data'].'templates/template.blog.tpl'),
),'',true,true);

$templates[5]= $modx->newObject('modTemplate');
$templates[5]->fromArray(array(
    'id' => 5,
    'templatename' => 'gallery',
    'description' => 'The template for gallery page.',
    'content' => file_get_contents($sources['data'].'templates/template.gallery.tpl'),
),'',true,true);

return $templates;
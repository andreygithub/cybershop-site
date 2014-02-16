<?php
/**
 * System settings
 *
 * @package cybershop-site
 * @subpackage build
 */
$settings = array();

$settings['error_page']= $modx->newObject('modSystemSetting');
$settings['error_page']->fromArray(array(
    'key' => 'error_page',
    'value' => '13',
    'xtype' => 'textfield',
    'namespace' => 'core',
    'area' => 'site',
),'',true,true);

$settings['unauthorized_page']= $modx->newObject('modSystemSetting');
$settings['unauthorized_page']->fromArray(array(
    'key' => 'unauthorized_page',
    'value' => '13',
    'xtype' => 'textfield',
    'namespace' => 'core',
    'area' => 'site',
),'',true,true);

$settings['site_name']= $modx->newObject('modSystemSetting');
$settings['site_name']->fromArray(array(
    'key' => 'site_name',
    'value' => 'Cybershop - fast online shop',
    'xtype' => 'textfield',
    'namespace' => 'core',
    'area' => 'site',
),'',true,true);

$settings['use_weblink_target']= $modx->newObject('modSystemSetting');
$settings['use_weblink_target']->fromArray(array(
    'key' => 'use_weblink_target',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'site',
),'',true,true);

$settings['hidemenu_default']= $modx->newObject('modSystemSetting');
$settings['hidemenu_default']->fromArray(array(
    'key' => 'hidemenu_default',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'site',
),'',true,true);

$settings['inline_help']= $modx->newObject('modSystemSetting');
$settings['inline_help']->fromArray(array(
    'key' => 'inline_help',
    'value' => false,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'manager',
),'',true,true);

$settings['topmenu_show_descriptions']= $modx->newObject('modSystemSetting');
$settings['topmenu_show_descriptions']->fromArray(array(
    'key' => 'topmenu_show_descriptions',
    'value' => false,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'manager',
),'',true,true);

$settings['automatic_alias']= $modx->newObject('modSystemSetting');
$settings['automatic_alias']->fromArray(array(
    'key' => 'automatic_alias',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'furls',
),'',true,true);

$settings['friendly_urls']= $modx->newObject('modSystemSetting');
$settings['friendly_urls']->fromArray(array(
    'key' => 'friendly_urls',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'furls',
),'',true,true);

$settings['friendly_urls_strict']= $modx->newObject('modSystemSetting');
$settings['friendly_urls_strict']->fromArray(array(
    'key' => 'friendly_urls_strict',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'furls',
),'',true,true);

$settings['global_duplicate_uri_check']= $modx->newObject('modSystemSetting');
$settings['global_duplicate_uri_check']->fromArray(array(
    'key' => 'global_duplicate_uri_check',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'furls',
),'',true,true);

$settings['use_alias_path']= $modx->newObject('modSystemSetting');
$settings['use_alias_path']->fromArray(array(
    'key' => 'use_alias_path',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'furls',
),'',true,true);


$settings['friendly_alias_translit']= $modx->newObject('modSystemSetting');
$settings['friendly_alias_translit']->fromArray(array(
    'key' => 'friendly_alias_translit',
    'value' => 'russian',
    'xtype' => 'textfield',
    'namespace' => 'core',
    'area' => 'furls',
),'',true,true);

$settings['locale']= $modx->newObject('modSystemSetting');
$settings['locale']->fromArray(array(
    'key' => 'locale',
    'value' => 'ru_RU.UTF-8',
    'xtype' => 'textfield',
    'namespace' => 'core',
    'area' => 'language',
),'',true,true);

$settings['compress_css']= $modx->newObject('modSystemSetting');
$settings['compress_css']->fromArray(array(
    'key' => 'compress_css',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'manager',
),'',true,true);

$settings['compress_js']= $modx->newObject('modSystemSetting');
$settings['compress_js']->fromArray(array(
    'key' => 'compress_js',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'core',
    'area' => 'manager',
),'',true,true);

return $settings;
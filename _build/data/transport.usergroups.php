<?php
/**
 * @package cybershop-site
 * @subpackage build
 */
$usergroups = array();

$usergroups[1]= $modx->newObject('modUserGroup');
$usergroups[1]->fromArray(array(
    'id' => 0,
    'name' => 'Менеджер',
    'description' => 'Менеджер сайта',
),'',true,true);

return $usergroups;
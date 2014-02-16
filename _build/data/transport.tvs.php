<?php
/**
 * @package cybershop-site
 * @subpackage build
 */
$tvs = array();

$tvs[1]= $modx->newObject('modTemplateVar');
$tvs[1]->fromArray(array(
    'id' => 1,
    'name' => 'tags',
    'caption' => 'Tags',
    'description' => 'Comma delimited tags for the current Resource.',
    'type' => 'autotag',
    'display' => 'default',
    'locked' => 0,
    'rank' => 0,
    'default_text' => '',
    'display_params' => '',
),'',true,true);
$tvt[1] = $modx->newObject('modTemplateVar');
$tvt[1]->fromArray(array(
    'templateid' => 4
));
//$tvs[1]->setOne($tvt[1]);

$tvs[2]= $modx->newObject('modTemplateVar');
$tvs[2]->fromArray(array(
    'id' => 2,
    'name' => 'image',
    'caption' => 'image',
    'description' => '',
    'type' => 'image',
    'display' => 'default',
    'locked' => 0,
    'rank' => 0,
    'default_text' => '',
    'display_params' => '',
),'',true,true);
$tvt[2] = $modx->newObject('modTemplateVar');
$tvt[2]->fromArray(array(
    'templateid' => 4
));
//$tvs[2]->setOne($tvt[2]);

$tvs[3]= $modx->newObject('modTemplateVar');
$tvs[3]->fromArray(array(
    'id' => 3,
    'name' => 'img-gallery',
    'caption' => 'Фото галерея',
    'description' => '',
    'type' => 'migx',
    'display' => 'default',
    'locked' => 0,
    'rank' => 0,
    'default_text' => '',
    'display_params' => '',
    'input_properties' => 'a:7:{s:7:"configs";s:0:"";s:8:"formtabs";s:173:"[{"caption":"Image", "fields": [
{"field":"set","caption":"Set"},
{"field":"description","caption":"Description"},
{"field":"image","caption":"Image","inputTV":"image"}
]
}]";s:7:"columns";s:233:"[{
"header": "Set", "sortable": "true", "dataIndex": "set"
},{
"header": "Description", "sortable": "true", "dataIndex": "description"
},{
"header": "Image", "sortable": "false", "dataIndex": "image","renderer": "this.renderImage"
}]";s:7:"btntext";s:0:"";s:10:"previewurl";s:0:"";s:10:"jsonvarkey";s:0:"";s:19:"autoResourceFolders";s:5:"false";}'
),'',true,true);
$tvt[3] = $modx->newObject('modTemplateVar');
$tvt[3]->fromArray(array(
    'templateid' => 5
));
//$tvs[3]->setOne($tvt[3]);

return $tvs;
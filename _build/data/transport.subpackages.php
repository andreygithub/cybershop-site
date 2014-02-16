<?php
/**
 * Package in subpackages
 *
 * @package cybershop-site
 */
$subpackages = array(
//    'cybershop'      => 'cybershop-1.2.1-beta',
//    'ace'            => 'ace-1.4.2-pl',
//    'breadcrumb'     => 'breadcrumb-1.3.1-pl',
//    'ckeditor'       => 'ckeditor-1.1.0-rc1',
//    'getpage'        => 'getpage-1.2.3-pl',
//    'getresources'   => 'getresources-1.6.0-pl',
//    'migx'           => 'migx-2.5.9-pl',
//    'phpthumbof'     => 'phpthumbof-1.4.0-pl',
//    'translit'       => 'translit-1.0.0-beta',
//    'wayfinder'      => 'wayfinder-2.3.3-pl',
);
$spAttr = array('vehicle_class' => 'xPDOTransportVehicle');

foreach ($subpackages as $name => $signature) {
    $vehicle = $builder->createVehicle(array(
        'source' => $sources['subpackages'] . $signature.'.transport.zip',
        'target' => "return MODX_CORE_PATH . 'packages/';",
    ),$spAttr);
    $vehicle->validate('php',array(
        'source' => $sources['validators'].'validate.'.$name.'.php'
    ));
    $builder->putVehicle($vehicle);
}

return true;
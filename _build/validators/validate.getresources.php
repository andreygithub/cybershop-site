<?php
/**
 * Verify Cybershop is latest or equal in version
 *
 * @package modxss
 */
$newer= true;
if ($transport && $transport->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $transport->xpdo;

            /* define formit version */
            $newVersion = '1.6.0-pl';
            $newVersionMajor = '1';
            $name = 'getresources';

            /* now loop through packages and check for newer versions
             * Do not install if newer or equal versions are found */
            $newer = true;
            $modx->addPackage('modx.transport',$modx->getOption('core_path').'model/');
            $c = $modx->newQuery('transport.modTransportPackage');
            $c->where(array(
                'package_name' => $name,
                'version_major:>=' => $newVersionMajor,
            ));
            $packages = $modx->getCollection('transport.modTransportPackage',$c);

            foreach ($packages as $package) {
                if ($package->compareVersion($newVersion)) {
                    $newer = false;
                    break;
                }
            }
            break;
    }
}

return $newer;
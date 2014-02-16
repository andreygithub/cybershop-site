<?php
/**
 * Build the setup options form.
 */
$exists = false;
$output = null;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:

	case xPDOTransport::ACTION_UPGRADE:

		break;

	case xPDOTransport::ACTION_UNINSTALL: break;
}

if (!$exists) {
	switch ($modx->getOption('manager_language')) {
		case 'ru':
			$output = 'Этот компонент требует дополнительные компоненты.<br/><br/>Могу я автоматически скачать и установить их?';
			break;
		default:
			$output = 'This component requires additional components.<br/><br/>Can i automaticly download and install its?';
	}

}

return $output;

<?php
/**
 * 
 *
 * @package modxss
 * @subpackage build
 */
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

/* set package defines */


/* override with your own defines here (see build.config.sample.php) */
require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once dirname(__FILE__). '/includes/functions.php';

/* setup sources */
$root = dirname(dirname(__FILE__)).'/';
$assets = MODX_ASSETS_PATH.'template/';
$sources= array (
    'root' => $root,
    'build' => $root .'_build/',
    'resolvers' => $root . '_build/resolvers/',
    'validators' => $root . '_build/validators/',
    'subpackages' => $root . '_build/subpackages/',
    'data' => $root . '_build/data/',
    'properties' => $root . '_build/properties/',
    'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
    'source_assets' => $root.'assets/template',
    'docs' => $root.'_build/docs/',
);
unset($root);

$modx= new modX();
$modx->initialize('mgr');
echo '<pre>'; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER,PKG_VERSION,PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/'.PKG_NAME_LOWER.'/');
$modx->log(modX::LOG_LEVEL_INFO,'Created Transport Package and Namespace.');

/* load system settings */
$settings = include $sources['data'].'transport.settings.php';
if (!is_array($settings)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in settings.');
} else {
	$attributes= array(
		xPDOTransport::UNIQUE_KEY => 'key',
		xPDOTransport::PRESERVE_KEYS => true,
		xPDOTransport::UPDATE_OBJECT => BUILD_SETTING_UPDATE,
	);
	foreach ($settings as $setting) {
		$vehicle = $builder->createVehicle($setting,$attributes);
		$builder->putVehicle($vehicle);
	}
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($settings).' System Settings.');
}
unset($settings,$setting,$attributes);

///* load plugins events */
//$events = include $sources['data'].'transport.events.php';
//if (!is_array($events)) {
//	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in events.');
//} else {
//	$attributes = array (
//		xPDOTransport::PRESERVE_KEYS => true,
//		xPDOTransport::UPDATE_OBJECT => BUILD_EVENT_UPDATE,
//	);
//	foreach ($events as $event) {
//		$vehicle = $builder->createVehicle($event,$attributes);
//		$builder->putVehicle($vehicle);
//	}
//	$modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugins events.');
//}
//unset ($events, $event, $attributes);

/* package in default access policy */
//$attributes = array (
//	xPDOTransport::PRESERVE_KEYS => false,
//	xPDOTransport::UNIQUE_KEY => array('name'),
//	xPDOTransport::UPDATE_OBJECT => BUILD_POLICY_UPDATE,
//);
//$policies = include $sources['data'].'transport.policies.php';
//if (!is_array($policies)) { $modx->log(modX::LOG_LEVEL_FATAL,'Adding policies failed.'); }
//foreach ($policies as $policy) {
//	$vehicle = $builder->createVehicle($policy,$attributes);
//	$builder->putVehicle($vehicle);
//}
//$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($policies).' Access Policies.'); flush();
//unset($policies,$policy,$attributes);

/* package in default access policy templates */
//$templates = include dirname(__FILE__).'/data/transport.policytemplates.php';
//$attributes = array (
//	xPDOTransport::PRESERVE_KEYS => false,
//	xPDOTransport::UNIQUE_KEY => array('name'),
//	xPDOTransport::UPDATE_OBJECT => BUILD_POLICY_TEMPLATE_UPDATE,
//	xPDOTransport::RELATED_OBJECTS => true,
//	xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
//		'Permissions' => array (
//			xPDOTransport::PRESERVE_KEYS => false,
//			xPDOTransport::UPDATE_OBJECT => BUILD_PERMISSION_UPDATE,
//			xPDOTransport::UNIQUE_KEY => array ('template','name'),
//		),
//	)
//);
//if (is_array($templates)) {
//	foreach ($templates as $template) {
//		$vehicle = $builder->createVehicle($template,$attributes);
//		$builder->putVehicle($vehicle);
//	}
//	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($templates).' Access Policy Templates.'); flush();
//} else {
//	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in Access Policy Templates.');
//}
//unset ($templates,$template,$attributes);

/* load user groups */
$usergroups = include_once $sources['data'].'transport.usergroups.php';
if (!is_array($usergroups)) $modx->log(modX::LOG_LEVEL_FATAL,'No User Groups returned.');
$attributes= array(
    xPDOTransport::UNIQUE_KEY => 'name',
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => true,
);
foreach ($usergroups as $usergroup) {
    $vehicle = $builder->createVehicle($usergroup,$attributes);
    $builder->putVehicle($vehicle);
}
$modx->log(modX::LOG_LEVEL_INFO,'Added in '.count($usergroups).' User Groups.'); flush();
unset($usergroups,$usergroup,$attributes);

/* load menus */
//$menus = include $sources['data'].'transport.menu.php';
//$attributes = array (
//	xPDOTransport::PRESERVE_KEYS => true,
//	xPDOTransport::UPDATE_OBJECT => BUILD_MENU_UPDATE,
//	xPDOTransport::UNIQUE_KEY => 'text',
//	xPDOTransport::RELATED_OBJECTS => true,
//	xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
//		'Action' => array (
//			xPDOTransport::PRESERVE_KEYS => false,
//			xPDOTransport::UPDATE_OBJECT => BUILD_ACTION_UPDATE,
//			xPDOTransport::UNIQUE_KEY => array ('namespace','controller'),
//		),
//	),
//);
//if (is_array($menus)) {
//	foreach ($menus as $menu) {
//		$vehicle = $builder->createVehicle($menu,$attributes);
//		$builder->putVehicle($vehicle);
//		/* @var modMenu $menu */
//		$modx->log(modX::LOG_LEVEL_INFO,'Packaged in menu "'.$menu->get('text').'".');
//	}
//}
//else {
//	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in menu.');
//}
//unset($vehicle,$menus,$menu,$attributes);


/* create category */
$modx->log(xPDO::LOG_LEVEL_INFO,'Created category.');
/* @var modCategory $category */
$category= $modx->newObject('modCategory');
$category->set('id',1);
$category->set('category',PKG_NAME);

/* add snippets */
$snippets = include $sources['data'].'transport.snippets.php';
if (!is_array($snippets)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
} else {
	$category->addMany($snippets);
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($snippets).' snippets.');
}

/* add chunks */
$chunks = include $sources['data'].'transport.chunks.php';
if (!is_array($chunks)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
} else {
	$category->addMany($chunks);
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($chunks).' chunks.');
}

/* add templates */
$templates = include $sources['data'].'transport.templates.php';
if (is_array($templates)) {
    $category->addMany($templates,'Templates');
} else { $modx->log(modX::LOG_LEVEL_FATAL,'Adding templates failed.'); }
$modx->log(modX::LOG_LEVEL_INFO,'Added in '.count($templates).' templates.'); flush();
unset($templates);

/* add plugins */
//$plugins = include $sources['data'].'transport.plugins.php';
//if (!is_array($plugins)) {
//	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in plugins.');
//} else {
//	$category->addMany($plugins);
//	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($plugins).' plugins.');
//}

/* add tvs */
$tvs = include $sources['data'].'transport.tvs.php';
if (is_array($tvs)) {
    $category->addMany($tvs,'TemplateVars');
} else { $modx->log(modX::LOG_LEVEL_FATAL,'Adding tvs failed.'); }
$modx->log(modX::LOG_LEVEL_INFO,'Added in '.count($tvs).' tvs.'); flush();
unset($tvs);

/* add subpackages */
$success = include $sources['data'].'transport.subpackages.php';
if (!$success) { $modx->log(modX::LOG_LEVEL_FATAL,'Adding subpackages failed.'); }
$modx->log(modX::LOG_LEVEL_INFO,'Added in subpackages.'); flush();
unset($success);

/* load resources */
$resources = include_once $sources['data'].'transport.resources.php';
if (!is_array($resources)) $modx->log(modX::LOG_LEVEL_FATAL,'No resources returned.');
$attributes= array(
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::UNIQUE_KEY => 'id',
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'ContentType' => array(
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => 'name',
        ),
    ),
);
foreach ($resources as $resource) {
    $vehicle = $builder->createVehicle($resource,$attributes);
    $builder->putVehicle($vehicle);
}
$modx->log(modX::LOG_LEVEL_INFO,'Added in '.count($resources).' Resources.'); flush();
unset($resources,$resource,$attributes);

/* create category vehicle */
$attr = array(
	xPDOTransport::UNIQUE_KEY => 'category',
	xPDOTransport::PRESERVE_KEYS => false,
	xPDOTransport::UPDATE_OBJECT => true,
	xPDOTransport::RELATED_OBJECTS => true,
	xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
		'Snippets' => array(
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => BUILD_SNIPPET_UPDATE,
			xPDOTransport::UNIQUE_KEY => 'name',
		),
		'Chunks' => array (
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => BUILD_CHUNK_UPDATE,
			xPDOTransport::UNIQUE_KEY => 'name',
		),
		'Plugins' => array (
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => BUILD_PLUGIN_UPDATE,
			xPDOTransport::UNIQUE_KEY => 'name',
		),
		'PluginEvents' => array (
			xPDOTransport::PRESERVE_KEYS => true,
			xPDOTransport::UPDATE_OBJECT => BUILD_EVENT_UPDATE,
			xPDOTransport::UNIQUE_KEY => array('pluginid','event'),
		),
	),
);
$vehicle = $builder->createVehicle($category,$attr);

/* now pack in resolvers */
$vehicle->resolve('file',array(
	'source' => $sources['source_assets'],
	'target' => "return MODX_ASSETS_PATH . '/';",
));
//$vehicle->resolve('file',array(
//	'source' => $sources['source_core'],
//	'target' => "return MODX_CORE_PATH . 'components/';",
//));

$resolvers = array(/*'extension','tables','policy','sources','settings',*/'setup');
foreach ($resolvers as $resolver) {
	if ($vehicle->resolve('php', array('source' => $sources['resolvers'] . 'resolve.'.$resolver.'.php'))) {
		$modx->log(modX::LOG_LEVEL_INFO,'Added resolver "'.$resolver.'" to category.');
	}
	else {
		$modx->log(modX::LOG_LEVEL_INFO,'Could not add resolver "'.$resolver.'" to category.');
	}
}

flush();
$builder->putVehicle($vehicle);

/* now pack in the license file, readme and setup options */
$builder->setPackageAttributes(array(
	'changelog' => file_get_contents($sources['docs'] . 'changelog.txt')
	,'license' => file_get_contents($sources['docs'] . 'license.txt')
	,'readme' => file_get_contents($sources['docs'] . 'readme.txt')
	,'setup-options' => array(
		'source' => $sources['build'].'setup.options.php',
	),
));
$modx->log(modX::LOG_LEVEL_INFO,'Added package attributes and setup options.');

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder->pack();
$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Package Built.<br />");

$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);

if (defined('PKG_AUTO_INSTALL') && PKG_AUTO_INSTALL) {
	$signature = $builder->getSignature();
	$sig = explode('-',$signature);
	$versionSignature = explode('.',$sig[1]);

	/* @var modTransportPackage $package */
	if (!$package = $modx->getObject('transport.modTransportPackage', array('signature' => $signature))) {
		$package = $modx->newObject('transport.modTransportPackage');
		$package->set('signature', $signature);
		$package->fromArray(array(
			'created' => date('Y-m-d h:i:s'),
			'updated' => null,
			'state' => 1,
			'workspace' => 1,
			'provider' => 0,
			'source' => $signature.'.transport.zip',
			'package_name' => $sig[0],
			'version_major' => $versionSignature[0],
			'version_minor' => !empty($versionSignature[1]) ? $versionSignature[1] : 0,
			'version_patch' => !empty($versionSignature[2]) ? $versionSignature[2] : 0,
		));
		if (!empty($sig[2])) {
			$r = preg_split('/([0-9]+)/',$sig[2],-1,PREG_SPLIT_DELIM_CAPTURE);
			if (is_array($r) && !empty($r)) {
				$package->set('release',$r[0]);
				$package->set('release_index',(isset($r[1]) ? $r[1] : '0'));
			} else {
				$package->set('release',$sig[2]);
			}
		}
		$package->save();
	}
	$package->install();
}

$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Execution time: {$totalTime}\n");
echo '</pre>';
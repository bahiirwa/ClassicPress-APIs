<?php
header( 'Content-Type: application/json' );

// Parameters for migration plugin.  Managed by a ClassicPress server because
// most new versions of WordPress and ClassicPress don't require any changes to
// the migration plugin other than updating these parameters.

// ClassicPress build info. See:
// https://github.com/ClassyBot/ClassicPress-nightly/releases
$build_version = '1.4.2';
$build_date = '20220712';

$version = "$build_version+migration.$build_date";
$build_url = 'https://github.com/ClassyBot/ClassicPress-nightly'
	. "/releases/download/$build_version%2Bmigration.$build_date"
	. "/ClassicPress-nightly-$build_version-migration.$build_date.zip";

echo json_encode( [
	// WordPress versions allowed for migration.
	'wordpress' => [
		'min'   => '4.9.0',
		'max'   => '6.0.1',
		'other' => [
			'#^4\.9$#',
			'#^6\.1-(alpha|beta|rc)#i',
		],
	],
	// ClassicPress build to use for migration.
	'classicpress' => [
		'build'   => $build_url,
		'version' => $version,
	],
	'php' => [
		'min' => '5.6',
		'max' => '7.4.999',
		'max_display' => '7.4.x',
	],
	'plugins' => [
		'wp-config-file-editor/wp-config-file-editor.php',
		'disable-wp-core-updates-advance/disable-wp-core-updates-advance.php',
		'disable-wordpress-updates/disable-updates.php',
		'wp-downgrade/wp-downgrade.php',
		'wp-views/wp-views.php',
		'types/wpcf.php',
		'cred-frontend-editor/plugin.php',
		'types-access/types-access.php',
		'toolset-blocks/wp-views.php',
		'toolset-maps/toolset-maps-loader.php',
		'woocommerce-views/views-woocommerce.php',
		'cred-commerce/plugin.php',
		'elementor/elementor.php',
		'review-widgets-for-trustpilot/review-widgets-for-trustpilot.php',
	],
	'themes' => [
		'twentytwentyone',
		'kadence',
		'astra',
	]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );

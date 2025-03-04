<?php
include_once('include/enqueue-scripts.php');
include_once('include/add-action.php');
include_once('include/add-filter.php');
// -----------------------------------------------
include_once('include/customizer-api.php');
include_once('include/comments-helper.php');
// -----------------------------------------------
include_once('include/admin-menu.php');
// -----------------------------------------------
if (! function_exists('fanpet_get_theme_mod')) {
	function fanpet_get_theme_mod($name, $default = false)
	{
		static $mods;

		$mods = empty($mods) ? get_theme_mods() : $mods;

		if (isset($mods[$name])) {
			return apply_filters("theme_mod_{$name}", $mods[$name]);
		}

		if (is_string($default)) {
			$default = sprintf($default, get_template_directory_uri(), get_stylesheet_directory_uri());
		}

		return apply_filters("theme_mod_{$name}", $default);
	}
}
// ------------------------------
function getYoutubeThumbnail($embedUrl, $quality = 'hqdefault')
{
	$urlParts = parse_url($embedUrl);

	if (isset($urlParts['path'])) {
		$pathSegments = explode('/', $urlParts['path']);
		$videoId = end($pathSegments);

		if (strpos($videoId, '?') !== false) {
			$videoId = explode('?', $videoId)[0];
		}
		return "https://img.youtube.com/vi/$videoId/$quality.jpg";
	}

	return null;
}

function getYouTubeThumbnailFromUrl($url)
{
	$parsedUrl = parse_url($url);

	if (isset($parsedUrl['query'])) {
		parse_str($parsedUrl['query'], $queryParams);
		if (isset($queryParams['v'])) {
			return "https://img.youtube.com/vi/" . $queryParams['v'] . "/maxresdefault.jpg";
		}
	}

	if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
		if (isset($parsedUrl['path'])) {
			$videoId = ltrim($parsedUrl['path'], '/');
			return "https://img.youtube.com/vi/" . $videoId . "/maxresdefault.jpg";
		}
	}

	return null;
}
function convertToEmbeddedLink($url)
{
	$parsedUrl = parse_url($url);

	if (isset($parsedUrl['query'])) {
		parse_str($parsedUrl['query'], $queryParams);
		if (isset($queryParams['v'])) {
			return "https://www.youtube.com/embed/" . $queryParams['v'];
		}
	}

	if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
		if (isset($parsedUrl['path'])) {
			return "https://www.youtube.com/embed" . $parsedUrl['path'];
		}
	}

	return $url;
}

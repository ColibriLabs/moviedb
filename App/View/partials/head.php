<?php

/**
 * @var \Colibri\Template\Core\Compiler $this
 * @var \Colibri\UrlGenerator\UrlBuilder $url
 * @var \ColibriLabs\Lib\Web\Metatag $metatag
 */

$subTitle = $this->section('title');
$subTitle = $subTitle === null ? null : sprintf('%s — ', $subTitle);

$description = $this->section('description');
$description = $description === null
  ? 'Lost Movie Database (lostDВ), library of films, actors, characters, directors, writers.' : $description;

?>
<head>
  <meta charset="utf-8">
  <title><?php echo $subTitle; ?>Lost Movie Database (lostDВ)</title>
  <meta name="description" content="<?php echo $description; ?>" />
  <meta name="keywords" content="lostdb,movie database,films,movies,actors,characters,directors,writers,pictures" />
  <meta property="og:site_name" content="Lost Movie Database (lostDВ)" />
  <?php echo $metatag->render(); ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo $url->staticPath('images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo $url->staticPath('css/site.min.css'); ?>" media="screen">
</head>
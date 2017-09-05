<?php

/**
 * @var \Colibri\URI\Builder $url
 * @var \Colibri\Pagination\Paginator $pagination
 */

$urlPath = isset($urlPath) ? $urlPath : '/';

$pagesNumber = $pagination->getTotalPages();

$pages = array_merge(range(1, 4), range($pagesNumber - 4, $pagesNumber));

?>
<ul class="pagination pagination-sm">
  <?php foreach($pages as $page): ?>
  <li><a href="<?php echo $url->path($urlPath, ['page' => $page]); ?>"><?php echo $page; ?></a></li>
  <?php endforeach; ?>
</ul>

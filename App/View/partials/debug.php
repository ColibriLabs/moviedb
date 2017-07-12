<?php

/**
 * @var \Colibri\Collection\ArrayCollection $queries
*/

use ColibriLabs\Lib\Util\Profiler;

$stringQuery = sprintf('[%s]', implode("]\n[", $queries->toArray()));

?>
<div class="container">
  <div class="debug">
    <pre><?php echo $stringQuery; ?></pre>
  </div>
  <span class="label label-primary"><?php echo Profiler::memoryUsage(); ?></span>
  <span class="label label-info"><?php echo Profiler::timeSpend(); ?>s</span>
</div>

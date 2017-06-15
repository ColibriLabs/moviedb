<div class="navbar navbar-<?php echo isset($navbar) ? $navbar : 'inverse'; ?> navbar-fixed-top" >
  <div class="container">

    <div class="navbar-header">
      <a class="logo-link" href="<?php echo $url->create('home:index'); ?>">
        <img class="logo" src="<?php echo $url->staticPath('images/qiwi-logo-thin.png'); ?>" alt="Qiwi Logo">
      </a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav navbar-left" >
        <li>
          <a href="<?php echo $url->create('search'); ?>">
<!--            <i class="fa fa-search"></i>-->
            Discover
          </a>
        </li>
        <li class="dropdown">
          <a
            class="dropdown-toggle"
            data-toggle="dropdown"
            id="themes"
            href="#">
<!--            <i class="fa fa-video-camera"></i>-->
            Movies
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Explore</a></li>
            <li><a href="<?php echo $url->create('movie:popular'); ?>">Popular</a></li>
            <li><a href="<?php echo $url->create('movie:top-rated'); ?>">Top Rated</a></li>
            <li><a href="<?php echo $url->create('movie:recently'); ?>">Recently</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo $url->create('person:explore'); ?>">
<!--            <i class="fa fa-users"></i>-->
            People
          </a>
        </li>
        <li>
          <a href="<?php echo $url->create('stats:db'); ?>">
<!--            <i class="fa fa-line-chart"></i>-->
            Stats
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo $url->create('auth:login'); ?>">
            <i class="fa fa-sign-in"></i>
            Login
          </a>
        </li>
        <li>
          <a href="<?php echo $url->create('auth:registration'); ?>">
            <i class="fa fa-user-circle-o"></i>
            Registration
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
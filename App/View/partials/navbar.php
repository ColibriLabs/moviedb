<div class="navbar navbar-<?php echo isset($navbar) ? $navbar : 'inverse'; ?> navbar-fixed-top" >
  <div class="container">

    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo $url->create('home:index'); ?>">
        lostDB
      </a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-main">

      <form class="navbar-form navbar-left hidden-sm" role="search" action="<?php echo $url->create('search:keyword-search'); ?>">
        <div class="form-group">
          <input type="text" class="form-control" name="q" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search...</button>
      </form>

      <ul class="nav navbar-nav navbar-left" >
        <li>
          <a
            href="#"
            class="dropdown-toggle"
            data-toggle="dropdown"
            id="search">
            Discover
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="search">
            <li><a href="<?php echo $url->create('movie:explore'); ?>">New Search</a></li>
            <li><div class="divider"></div></li>
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Most Popular</a></li>
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Biggest Budget</a></li>
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Top IMDb</a></li>
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Top TMDb</a></li>
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Top LostDB</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a
            class="dropdown-toggle"
            data-toggle="dropdown"
            id="movies"
            href="#">
            Movies
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="movies">
            <li><a href="<?php echo $url->create('movie:explore'); ?>">Explore</a></li>
            <li><a href="<?php echo $url->create('movie:popular'); ?>">Popular</a></li>
            <li><a href="<?php echo $url->create('movie:top-rated'); ?>">Top Rated</a></li>
            <li><a href="<?php echo $url->create('movie:recently'); ?>">Recently</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo $url->create('person:explore'); ?>">
            People
          </a>
        </li>
        <li>
          <a href="<?php echo $url->create('stats:db'); ?>">
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
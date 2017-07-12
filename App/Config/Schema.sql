CREATE TABLE `movies` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `collection_id` INT(11) UNSIGNED DEFAULT NULL,
  `tmdb_id` INT(11) UNSIGNED NOT NULL,
  `imdb_id` VARCHAR(9) NOT NULL ,
  `budget` INT(11) UNSIGNED NOT NULL ,
  `revenue` INT(11) UNSIGNED DEFAULT NULL,
  `runtime` INT(11) UNSIGNED DEFAULT NULL,
  `adult` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `release_date` datetime DEFAULT NULL,
  `title` VARCHAR(255) NOT NULL,
  `original_title` VARCHAR(255) NOT NULL,
  `iso_language` CHAR(2) NOT NULL DEFAULT 'en',
  `overview` TEXT DEFAULT NULL ,
  `tagline` TEXT DEFAULT NULL ,
  `tmdb_votes` INT(11) UNSIGNED NOT NULL DEFAULT 0,
  `tmdb_rating` FLOAT(10, 4) NOT NULL DEFAULT 0.0000,
  `imdb_votes` INT(11) UNSIGNED NOT NULL DEFAULT 0,
  `imdb_rating` FLOAT(10, 4) UNSIGNED NOT NULL DEFAULT 0.0000,
  `mpaa_rating` ENUM('G', 'PG', 'PG-13', 'R', 'NC-17') NOT NULL DEFAULT 'PG-13',
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movie_translations` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `locale` VARCHAR(16) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `overview` TEXT DEFAULT NULL ,
  `tagline` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movie_genre` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `genre_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movie_company` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `company_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movie_country` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `country_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movie_language` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `language_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `collections` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tmdb_id` INT(11) UNSIGNED NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `companies` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tmdb_id` INT(11) UNSIGNED NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `countries` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iso_3166_1` CHAR(2) NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `languages` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iso_639_1` CHAR(2) NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `genres` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tmdb_id` INT(11) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `characters` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` INT(11) UNSIGNED NOT NULL,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `character` VARCHAR(64) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `crews` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` INT(11) UNSIGNED NOT NULL,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `department` VARCHAR(64) NOT NULL,
  `job` VARCHAR(64) NOT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `profiles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tmdb_id` INT(11) UNSIGNED NOT NULL,
  `imdb_id` VARCHAR(9) NOT NULL ,
  `name` VARCHAR(64) NOT NULL,
  `biography` TEXT DEFAULT NULL ,
  `adult` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `sex` ENUM('F', 'M') NOT NULL DEFAULT 'M',
  `birthday` datetime DEFAULT NULL,
  `deathday` datetime DEFAULT NULL,
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pictures` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `height` INT(11) UNSIGNED NOT NULL,
  `width` VARCHAR(9) NOT NULL ,
  `file_path` VARCHAR(128) NOT NULL,
  `tmdb_file_path` VARCHAR(128) NOT NULL,
  `iso_639_1` CHAR(2) NOT NULL DEFAULT 'en',
  `version` int(11) UNSIGNED DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photos` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `picture_id` INT(11) UNSIGNED NOT NULL,
  `profile_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `backdrops` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `picture_id` INT(11) UNSIGNED NOT NULL,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `posters` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `picture_id` INT(11) UNSIGNED NOT NULL,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `{prefix}_{dirname}_file` (
  `file_id` int(11) unsigned NOT NULL  auto_increment,
  `name` varchar(255) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL,
  `parent_id` int(11) unsigned NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `mtime` int(11) unsigned NOT NULL,
  `perm` varchar(3) NOT NULL,
  `umask` varchar(3) NOT NULL,
  `c_type` int(11) unsigned NOT NULL,
  `mime` varchar(255) NOT NULL,
  `width` int(11) unsigned NOT NULL,
  `height` int(11) unsigned NOT NULL,
  `ctime` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`file_id`)) ENGINE=MyISAM;

CREATE TABLE `{prefix}_{dirname}_content` (
  `content_id` int(11) unsigned NOT NULL  auto_increment,
  `content` longblob NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`content_id`)) ENGINE=MyISAM;

CREATE TABLE `{prefix}_{dirname}_link` (
  `link_id` int(11) unsigned NOT NULL  auto_increment,
  `title` varchar(255) NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  `mid` int(11) unsigned NOT NULL,
  `param` varchar(25) NOT NULL,
  `val` varchar(25) NOT NULL,
  `uri` text NOT NULL,
  `posttime` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`link_id`)) ENGINE=MyISAM;


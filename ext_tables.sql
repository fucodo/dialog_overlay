#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
  cookie_lifetime_days int(11) unsigned NOT NULL DEFAULT '30',
  cookie_name varchar(255) NOT NULL DEFAULT '',
  auto_open smallint(5) unsigned NOT NULL DEFAULT '1',
  show_close_button smallint(5) unsigned NOT NULL DEFAULT '1',
  close_button_label varchar(255) NOT NULL DEFAULT ''
);

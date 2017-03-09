
--
-- Table structure for table `atoms`
--

CREATE TABLE IF NOT EXISTS `atoms` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_vid` int(11) NOT NULL,
  `a_faceId` int(11) NOT NULL,
  `a_type` enum('ATOM','FRAME','WIZARD','CONFIX') NOT NULL,
  `a_s_id` int(11) NOT NULL,
  `a_fid` int(11) NOT NULL,
  `a_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `a_sort` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_name_xx` tinytext NOT NULL,
  `a_name_de` varchar(255) NOT NULL,
  `a_name_en` varchar(255) NOT NULL,
  `a_name_ru` varchar(255) NOT NULL,
  `a_name_fr` varchar(255) NOT NULL,
  `a_name_it` varchar(255) NOT NULL,
  `a_name_ro` varchar(255) NOT NULL,
  `a_revision` int(11) NOT NULL,
  `a_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `a_isFrame` enum('Y','N') NOT NULL DEFAULT 'N',
  `a_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `a_lastmodBy` int(11) NOT NULL,
  `a_createdBy` int(11) NOT NULL,
  `a_contentType` int(11) NOT NULL COMMENT 'HTML, etc....',
  `a_language` varchar(2) NOT NULL COMMENT '* oder specific',
  `a_content` longtext NOT NULL,
  `a_content_size_bytes` int(11) NOT NULL,
  `a_wizard_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `a_wizard_as_p_id` int(11) NOT NULL,
  `a_wizard_as_p_name` int(11) NOT NULL,
  `a_wizard_as_p_name_wizard` tinytext NOT NULL,
  `a_wizardSettings` longtext NOT NULL,
  `a_content_3` longtext NOT NULL,
  `a_content_2` longtext NOT NULL,
  `a_content_1` longtext NOT NULL,
  `a_content_4` longtext NOT NULL,
  `a_name_cz` tinytext NOT NULL,
  `a_name_hu` tinytext NOT NULL,
  `a_name_bb` tinytext NOT NULL,
  `a_gui_cols` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`a_id`),
  KEY `a_s_id` (`a_s_id`),
  KEY `a_fid` (`a_fid`,`a_del`),
  KEY `a_s_id_2` (`a_s_id`,`a_fid`,`a_del`),
  KEY `a_type` (`a_type`,`a_s_id`,`a_fid`,`a_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=477 ;

-- --------------------------------------------------------

--
-- Table structure for table `atoms_history`
--

CREATE TABLE IF NOT EXISTS `atoms_history` (
  `ah_id` int(11) NOT NULL AUTO_INCREMENT,
  `ah_a_id` int(11) NOT NULL,
  `ah_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ah_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ah_backup` longtext NOT NULL,
  `ah_backup_2` longtext NOT NULL,
  `ah_backup_3` longtext NOT NULL,
  `ah_backup_1` longtext NOT NULL,
  `ah_backup_4` longtext NOT NULL,
  PRIMARY KEY (`ah_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3825 ;

-- --------------------------------------------------------

--
-- Table structure for table `atoms_settings`
--

CREATE TABLE IF NOT EXISTS `atoms_settings` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_fid` int(11) NOT NULL DEFAULT '0',
  `as_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_a_id` int(11) NOT NULL,
  `as_gui` enum('NORMAL','HIDDEN','READONLY') NOT NULL DEFAULT 'NORMAL',
  `as_group` varchar(255) NOT NULL,
  `as_name` varchar(255) NOT NULL,
  `as_name_de` varchar(255) NOT NULL,
  `as_name_en` varchar(255) NOT NULL,
  `as_name_ru` varchar(255) NOT NULL,
  `as_name_fr` varchar(255) NOT NULL,
  `as_name_it` varchar(255) NOT NULL,
  `as_name_ro` varchar(255) NOT NULL,
  `as_label` varchar(255) NOT NULL,
  `as_help` longtext NOT NULL,
  `as_sort` int(11) NOT NULL,
  `as_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `as_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `as_createdBy` int(11) NOT NULL,
  `as_lastmodBy` int(11) NOT NULL,
  `as_type` enum('WID','WATTRIBUTE','WIZARD2WIZARD','UNDEFINED','TEXT','TEXTAREA','HTML','FILE','FLOAT','COMBO','CONTAINER','TIMESTAMP','DATE','TIME','INT','RADIO','CHECKBOX','COMMENT','LINK','ARRAY','WIZARD','CAPTCHA','HIDDEN','PASSWORD','UPLOAD','ATOMLIST','WIZARDLIST','MD5PASSWORD','GEO-POINT','GEO-BOX','GEO-POLY','CONTAINER-IMAGES','CONTAINER-FILES','YN','SIMPLE_W2W','UNIQUE_W2W','DIR','PAGE','FRAME','ATOM','ACTION','COLLECTOR','REMOTE_FIELD','STAMPER','IMAGE','INFOPOOL_RECORD','TIMEMACHINE') NOT NULL DEFAULT 'UNDEFINED',
  `as_type_multilang` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_config` longtext NOT NULL,
  `as_init` longtext NOT NULL,
  `as_content` longtext NOT NULL,
  `as_useAsHeader` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_db` tinytext NOT NULL,
  `as_collection` varchar(255) NOT NULL,
  `as_name_cz` tinytext NOT NULL,
  `as_name_hu` tinytext NOT NULL,
  `as_name_bb` tinytext NOT NULL,
  `as_gui_mode` int(11) NOT NULL,
  `as_gui_pos` enum('L','R','F','H','3') NOT NULL DEFAULT 'F',
  `as_gui_width` int(11) NOT NULL DEFAULT '1',
  `as_gui_height` int(11) NOT NULL,
  `as_useAsHeaderSort` int(11) NOT NULL DEFAULT '100000',
  `as_use4Export` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_use4ExportSort` int(11) NOT NULL DEFAULT '100000',
  PRIMARY KEY (`as_id`),
  KEY `as_a_id` (`as_a_id`),
  KEY `as_del` (`as_del`,`as_a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1731 ;

-- --------------------------------------------------------

--
-- Table structure for table `be_language`
--

CREATE TABLE IF NOT EXISTS `be_language` (
  `bel_id` int(11) NOT NULL AUTO_INCREMENT,
  `bel_ISO` varchar(2) NOT NULL,
  `bel_name` varchar(255) NOT NULL,
  `bel_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `bel_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `bel_sort` int(11) NOT NULL,
  `bel_fid` int(11) NOT NULL,
  `bel_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bel_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bel_lastModBy` int(11) NOT NULL,
  `bel_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`bel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `be_tags`
--

CREATE TABLE IF NOT EXISTS `be_tags` (
  `bet_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_fid` int(11) NOT NULL,
  `bet_sort` int(11) NOT NULL,
  `bet_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `bet_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bet_lastChangedBy` int(11) NOT NULL,
  `bet_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bet_createdBy` int(11) NOT NULL,
  `bet_found` enum('Y','N') NOT NULL DEFAULT 'N',
  `bet_foundFile` tinytext NOT NULL,
  `bet_type` enum('AUTO','MANUAL') NOT NULL DEFAULT 'AUTO',
  `bet_exportAlways` enum('Y','N') NOT NULL DEFAULT 'N',
  `bet_tag` varchar(255) NOT NULL,
  `bet_tag_md5` varchar(50) NOT NULL,
  `bet_t_de` tinytext NOT NULL,
  `bet_t_cz` tinytext NOT NULL,
  `bet_t_hu` tinytext NOT NULL,
  `bet_t_bb` tinytext NOT NULL,
  `bet_t_xx` tinytext NOT NULL,
  `bet_t_en` tinytext NOT NULL,
  `bet_t_ru` tinytext NOT NULL,
  `bet_t_it` tinytext NOT NULL,
  `bet_t_fr` tinytext NOT NULL,
  `bet_t_ro` tinytext NOT NULL,
  PRIMARY KEY (`bet_id`),
  UNIQUE KEY `bet_tag_md5` (`bet_tag_md5`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `be_users`
--

CREATE TABLE IF NOT EXISTS `be_users` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_u_title` text NOT NULL COMMENT '374::TEXT:: Titel',
  `wz_u_firstName` text NOT NULL COMMENT '375::TEXT:: Vorname',
  `wz_u_lastName` text NOT NULL COMMENT '376::TEXT:: Nachname',
  `wz_u_email` text NOT NULL COMMENT '377::TEXT:: E-Mail',
  `wz_u_username` text NOT NULL COMMENT '378::TEXT:: Username',
  `wz_u_password` tinytext NOT NULL COMMENT '379::MD5PASSWORD:: Passwort',
  `wz_u_company` text NOT NULL COMMENT '380::TEXT:: Firma',
  `wz_u_phone` text NOT NULL COMMENT '381::TEXT:: Telefon',
  `wz_u_mobile` text NOT NULL COMMENT '382::TEXT:: Mobil',
  `wz_u_gender` enum('W','M') NOT NULL DEFAULT 'W' COMMENT '388::RADIO:: Geschlecht',
  `wz_tm_id` int(11) NOT NULL,
  `wz_u_is_admin` enum('Y','N') NOT NULL DEFAULT 'N',
  `wz_u_start_cfg` longtext NOT NULL COMMENT '1580::TEXTAREA:: Start - Konfiguration',
  `wz_u_limit_sites` longtext NOT NULL COMMENT '1571::TEXTAREA:: Projekte',
  `wz_u_limit_pages` longtext NOT NULL COMMENT '1572::TEXTAREA:: Seiten',
  `wz_u_limit_mode` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1573::COMBO:: Limitierungen',
  `wz_u_limits_SITES` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_PAGES` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_FRAMES` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_ATOMS` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_WIZARDS` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_FA` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_INFOPOOL` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_FE_TRANS` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limit_frames` longtext NOT NULL COMMENT '1575::TEXTAREA:: Seitenelemente',
  `wz_u_limit_atoms` longtext NOT NULL COMMENT '1576::TEXTAREA:: Bausteine',
  `wz_u_limit_wizards` longtext NOT NULL COMMENT '1577::TEXTAREA:: Wizards',
  `wz_u_limit_fa` longtext NOT NULL COMMENT '1578::TEXTAREA:: Filearchiv',
  `wz_u_limit_infopool` longtext NOT NULL COMMENT '1579::TEXTAREA:: Infopool',
  `wz_xme_pages_root` int(11) NOT NULL COMMENT '1239::INT:: Seiten-Wurzel',
  `wz_xme_frames` longtext NOT NULL COMMENT '1240::TEXTAREA:: Templates (Frames)',
  `wz_xme_siteid` int(11) NOT NULL COMMENT '1241::INT:: Newsletter SID',
  `wz_u_start_lang` text NOT NULL COMMENT '1581::TEXT:: Start Sprache',
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='WIZARD :: Backend Users (73)' AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `be_users2groups`
--

CREATE TABLE IF NOT EXISTS `be_users2groups` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_u2g_u` int(11) NOT NULL COMMENT '404::WIZARD:: User',
  `wz_u2g_g` int(11) NOT NULL COMMENT '405::WIZARD:: Gruppe',
  `wz_u2g_dirtyEntity` text NOT NULL COMMENT '414::TEXT:: Textbeschreibung',
  `wz_tm_id` int(11) NOT NULL,
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='WIZARD :: Backend Users2Gruppen (79)' AUTO_INCREMENT=41 ;



-- --------------------------------------------------------

--
-- Table structure for table `be_users_groups`
--

CREATE TABLE IF NOT EXISTS `be_users_groups` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_bg_name` text NOT NULL COMMENT '412::TEXT:: Gruppenbezeichnung',
  `wz_tm_id` int(11) NOT NULL,
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='WIZARD :: Backend Gruppen (78)' AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Table structure for table `be_users_history`
--

CREATE TABLE IF NOT EXISTS `be_users_history` (
  `buh_id` int(11) NOT NULL AUTO_INCREMENT,
  `buh_sort` int(11) NOT NULL,
  `buh_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `buh_fid` int(11) NOT NULL,
  `buh_name` varchar(10) NOT NULL,
  `buh_r_id` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `buh_wz_id` int(11) NOT NULL,
  `buh_wz_name` varchar(255) NOT NULL,
  `buh_table` varchar(255) NOT NULL,
  `buh_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `buh_createdBy` int(11) NOT NULL,
  `buh_type` enum('INSERT','UPDATE','DELETE','OTHER','LOGIN','LOGOFF','UPLOAD','FILE_DELETE','FILE_MOVE','DIR_CREATED','DIR_DELETE','DIR_MOVE','FILE_COPY','USER_DELETE','USER_INSERT','USER_UPDATE','ROLE_INSERT','ROLE_UPDATE','ROLE_DELETE') NOT NULL DEFAULT 'OTHER',
  `buh_human` varchar(255) NOT NULL,
  PRIMARY KEY (`buh_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8659 ;

-- --------------------------------------------------------

--
-- Table structure for table `controllers`
--

CREATE TABLE IF NOT EXISTS `controllers` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_vid` int(11) NOT NULL,
  `c_s_id` int(11) NOT NULL,
  `c_fid` int(11) NOT NULL,
  `c_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `c_sort` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `c_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `c_lastmodBy` int(11) NOT NULL,
  `c_createdBy` int(11) NOT NULL,
  `c_content` longtext NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_s_id` (`c_s_id`),
  KEY `c_fid` (`c_fid`,`c_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) NOT NULL,
  `d_s_id` int(11) NOT NULL COMMENT 'site',
  `d_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `d_fid` int(11) NOT NULL,
  `d_sort` int(11) NOT NULL,
  `d_online` enum('Y','N') NOT NULL,
  `d_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `d_lastModBy` int(11) NOT NULL,
  `d_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`d_id`),
  UNIQUE KEY `d_name_2` (`d_name`),
  KEY `d_name` (`d_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `faces`
--

CREATE TABLE IF NOT EXISTS `faces` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_origin` enum('CMS','APP','CORE') NOT NULL DEFAULT 'CMS',
  `f_origin_vid` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_desc` varchar(255) NOT NULL,
  `f_sort` int(11) NOT NULL,
  `f_fid` int(11) NOT NULL,
  `f_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `f_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `f_lastModBy` int(11) NOT NULL,
  `f_createdBy` int(11) NOT NULL,
  `f_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `f_online` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `fe_language`
--

CREATE TABLE IF NOT EXISTS `fe_language` (
  `fel_id` int(11) NOT NULL AUTO_INCREMENT,
  `fel_ISO` varchar(2) NOT NULL,
  `fel_name` varchar(255) NOT NULL,
  `fel_sort` int(11) NOT NULL,
  `fel_fid` int(11) NOT NULL,
  `fel_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fel_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fel_lastModBy` int(11) NOT NULL,
  `fel_createdBy` int(11) NOT NULL,
  `fel_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `fel_online` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`fel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `fe_tags`
--

CREATE TABLE IF NOT EXISTS `fe_tags` (
  `fet_id` int(11) NOT NULL AUTO_INCREMENT,
  `fet_s_id` int(11) NOT NULL,
  `fet_fid` int(11) NOT NULL,
  `fet_sort` int(11) NOT NULL,
  `fet_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `fet_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fet_lastChangedBy` int(11) NOT NULL,
  `fet_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fet_createdBy` int(11) NOT NULL,
  `fet_tag` varchar(255) NOT NULL,
  `fet_tag_md5` varchar(50) NOT NULL,
  `fet_t_de` tinytext NOT NULL,
  `fet_t_cz` tinytext NOT NULL,
  `fet_t_hu` tinytext NOT NULL,
  `fet_t_en` tinytext NOT NULL,
  `fet_t_ru` tinytext NOT NULL,
  `fet_t_it` tinytext NOT NULL,
  `fet_t_fr` tinytext NOT NULL,
  `fet_t_ro` tinytext NOT NULL,
  `fet_t_bb` tinytext NOT NULL,
  PRIMARY KEY (`fet_id`),
  UNIQUE KEY `fet_tag_md5` (`fet_tag_md5`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=282 ;

-- --------------------------------------------------------

--
-- Table structure for table `fe_users_config`
--

CREATE TABLE IF NOT EXISTS `fe_users_config` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_WIZARD_ID` int(11) NOT NULL COMMENT '896::INT:: Wizard ID',
  `wz_SESSION_NAME` text NOT NULL COMMENT '903::TEXT:: Session Name',
  `wz_AFTER_LOGIN_FN` text NOT NULL COMMENT '904::TEXT:: After Login Function (SITE-CALL)',
  `wz_PAGE_LOGIN` int(11) NOT NULL COMMENT '897::INT:: Login',
  `wz_PAGE_ACCOUNT` int(11) NOT NULL COMMENT '898::INT:: Account',
  `wz_PAGE_RESEND_TOKEN` int(11) NOT NULL COMMENT '899::INT:: Resend -  Token',
  `wz_PAGE_RESEND_PWD` int(11) NOT NULL COMMENT '900::INT:: Resend - Password',
  `wz_PAGE_ERROR_DUPLICATE_EMAIL` int(11) NOT NULL COMMENT '901::INT:: Error-Duplicate E-Mail',
  `wz_PAGE_CHECK_TOKEN` int(11) NOT NULL COMMENT '902::INT:: Check Token',
  `wz_MAIL_WELCOME_WITH_TOKEN` int(11) NOT NULL COMMENT '905::INT:: Welcome Page',
  `wz_MAIL_WELCOME_WITH_TOKEN_SUBJECT` text NOT NULL COMMENT '906::TEXT:: Welcome Subject',
  `wz_MAIL_RESET_WITH_TOKEN` int(11) NOT NULL COMMENT '907::INT:: Reset Password Page',
  `wz_MAIL_RESET_WITH_TOKEN_SUBJECT` text NOT NULL COMMENT '908::TEXT:: Reset Password Subject',
  `_DE_wz_MAIL_WELCOME_WITH_TOKEN_SUBJECT` text NOT NULL COMMENT '906::TEXT:: Welcome Subject',
  `_EN_wz_MAIL_WELCOME_WITH_TOKEN_SUBJECT` text NOT NULL COMMENT '906::TEXT:: Welcome Subject',
  `_DE_wz_MAIL_RESET_WITH_TOKEN_SUBJECT` text NOT NULL COMMENT '908::TEXT:: Reset Password Subject',
  `_EN_wz_MAIL_RESET_WITH_TOKEN_SUBJECT` text NOT NULL COMMENT '908::TEXT:: Reset Password Subject',
  `wz_FIELD_TYPE` text NOT NULL COMMENT '909::TEXT:: Typ',
  `wz_FIELD_NAME_FIRST` text NOT NULL COMMENT '910::TEXT:: Firstname',
  `wz_FIELD_NAME_LAST` text NOT NULL COMMENT '911::TEXT:: Lastname',
  `wz_FIELD_EMAIL` text NOT NULL COMMENT '912::TEXT:: E-Mail',
  `wz_FIELD_UNAME` text NOT NULL COMMENT '913::TEXT:: Username',
  `wz_FIELD_UPASSWORD` text NOT NULL COMMENT '914::TEXT:: Password',
  `wz_FIELD_CONFIRMED_TOKEN` text NOT NULL COMMENT '915::TEXT:: Token',
  `wz_FIELD_CONFIRMED` text NOT NULL COMMENT '916::TEXT:: Confirmed',
  `wz_FIELD_PWDTOKEN` text NOT NULL COMMENT '917::TEXT:: Passwort Reset Token',
  `wz_SITE_ID` int(11) NOT NULL COMMENT '918::INT:: SiteId',
  `wz_AFTER_SAVE_FN` text NOT NULL COMMENT '927::TEXT:: After Save Function (SITE-CALL)',
  `wz_AFTER_REGISTER_FN` text NOT NULL COMMENT '928::TEXT:: After Register Function (SITE-CALL)',
  `wz_MAIL_FROM_EMAIL` text NOT NULL COMMENT '939::TEXT:: Absender E-Mail',
  `wz_MAIL_FROM_NAME` text NOT NULL COMMENT '940::TEXT:: Absender Name',
  `wz_tm_id` int(11) NOT NULL,
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='WIZARD :: Front End Users (202)' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `frontcontrollers`
--

CREATE TABLE IF NOT EXISTS `frontcontrollers` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_vid` int(11) NOT NULL,
  `fc_s_id` int(11) NOT NULL,
  `fc_fid` int(11) NOT NULL,
  `fc_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `fc_sort` int(11) NOT NULL,
  `fc_name` varchar(255) NOT NULL,
  `fc_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `fc_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fc_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fc_lastmodBy` int(11) NOT NULL,
  `fc_createdBy` int(11) NOT NULL,
  `fc_content` longtext NOT NULL,
  PRIMARY KEY (`fc_id`),
  KEY `fc_s_id` (`fc_s_id`),
  KEY `fc_fid` (`fc_fid`,`fc_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `nl_mailing_lists`
--

CREATE TABLE IF NOT EXISTS `nl_mailing_lists` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_tm_id` int(11) NOT NULL,
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_name` text NOT NULL COMMENT '810::TEXT:: Verteilername',
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: mailinglists (188)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nl_mailing_lists_nn`
--

CREATE TABLE IF NOT EXISTS `nl_mailing_lists_nn` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_tm_id` int(11) NOT NULL,
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_ml_id` int(11) NOT NULL COMMENT '811::WIZARD:: Mailinglist',
  `wz_wz_id` int(11) NOT NULL COMMENT '812::WIZARD:: Wizard Adapter',
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: mailingslists_nn (189)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nl_urecords`
--

CREATE TABLE IF NOT EXISTS `nl_urecords` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_tm_id` int(11) NOT NULL,
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_nlr_name_first` text NOT NULL COMMENT '798::TEXT:: Vorname',
  `wz_nlr_name_last` text NOT NULL COMMENT '799::TEXT:: Nachname',
  `wz_nlr_email` text NOT NULL COMMENT '800::TEXT:: E-Mail',
  `wz_nlr_title` text NOT NULL COMMENT '801::TEXT:: Titel',
  `wz_nlr_lang` enum('DE','EN') NOT NULL DEFAULT 'DE' COMMENT '802::COMBO:: Sprache',
  `wz_nlr_gender` enum('M','W') NOT NULL DEFAULT 'M' COMMENT '803::COMBO:: Geschlecht',
  `wz_nlr_from_wizard` int(11) NOT NULL COMMENT '804::INT:: Datensatz Herkunft (Wizard)',
  `wz_nlr_from_wizard_id` int(11) NOT NULL COMMENT '805::INT:: Datensatz ID',
  `wz_nlr_cancled_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '806::TIMESTAMP:: Zeitpunkt der Abbestellung',
  `wz_nlr_state` enum('ACTIVE','DISABLED') NOT NULL DEFAULT 'ACTIVE' COMMENT '807::COMBO:: Status',
  `wz_nlr_salutation` text NOT NULL COMMENT '808::TEXT:: Anrede',
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: urecords (187)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nl_wconnectors`
--

CREATE TABLE IF NOT EXISTS `nl_wconnectors` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_tm_id` int(11) NOT NULL,
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `wz_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `wz_F_LANG` int(11) NOT NULL COMMENT '784::WATTRIBUTE:: Sprache',
  `wz_F_EMAIL` int(11) NOT NULL COMMENT '785::WATTRIBUTE:: E-Mail',
  `wz_F_TITLE` int(11) NOT NULL COMMENT '786::WATTRIBUTE:: Title',
  `wz_F_SALUTATION` int(11) NOT NULL COMMENT '787::WATTRIBUTE:: Anrede',
  `wz_F_NAME_FIRST` int(11) NOT NULL COMMENT '788::WATTRIBUTE:: Vorname',
  `wz_F_NAME_LAST` int(11) NOT NULL COMMENT '789::WATTRIBUTE:: Nachname',
  `wz_w_use` enum('OK','NOK') NOT NULL DEFAULT 'OK' COMMENT '790::COMBO:: Status',
  `wz_w_name` text NOT NULL COMMENT '791::TEXT:: Beschreibung',
  `wz_F_TAKE_KEY` int(11) NOT NULL COMMENT '792::WATTRIBUTE:: Feld',
  `wz_F_TAKE_VALUE` text NOT NULL COMMENT '793::TEXT:: Wert',
  `wz_F_TAKE_KEY2` int(11) NOT NULL COMMENT '794::WATTRIBUTE:: Feld2',
  `wz_F_TAKE_VALUE2` int(11) NOT NULL COMMENT '795::WATTRIBUTE:: Feld2',
  `wz_F_GENDER` int(11) NOT NULL COMMENT '796::WATTRIBUTE:: Geschlecht',
  `wz_w_w_id` int(11) NOT NULL COMMENT '797::INT:: Wizard',
  PRIMARY KEY (`wz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: wconnectors (186)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_vid` int(11) NOT NULL,
  `p_s_id` int(11) NOT NULL,
  `p_isOnline` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_forAdminOnly` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `p_sort` int(11) NOT NULL DEFAULT '99999999',
  `p_vars` text NOT NULL,
  `p_nice` varchar(255) NOT NULL,
  `p_nice_ro` tinytext NOT NULL,
  `p_nice_ru` tinytext NOT NULL,
  `p_nice_it` tinytext NOT NULL,
  `p_nice_fr` tinytext NOT NULL,
  `p_nice_en` tinytext NOT NULL,
  `p_nice_de` tinytext NOT NULL,
  `p_nice_cz` tinytext NOT NULL,
  `p_nice_hu` tinytext NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_name_cz` tinytext NOT NULL,
  `p_name_hu` tinytext NOT NULL,
  `p_name_xx` tinytext NOT NULL,
  `p_name_de` varchar(255) NOT NULL,
  `p_name_en` varchar(255) NOT NULL,
  `p_name_ru` varchar(255) NOT NULL,
  `p_name_fr` varchar(255) NOT NULL,
  `p_name_it` varchar(255) NOT NULL,
  `p_name_ro` varchar(255) NOT NULL,
  `p_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `p_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `p_lastmodBy` int(11) NOT NULL,
  `p_createdBy` int(11) NOT NULL,
  `p_frameid` int(11) NOT NULL COMMENT 'frameid',
  `p_inMenue_2` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue_3` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue_1` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue_4` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_tm_id` int(11) NOT NULL,
  `p_nice_bb` tinytext NOT NULL,
  `p_name_bb` tinytext NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=336 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages_history`
--

CREATE TABLE IF NOT EXISTS `pages_history` (
  `ph_id` int(11) NOT NULL AUTO_INCREMENT,
  `ph_p_id` int(11) NOT NULL,
  `ph_p_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ph_p_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ph_p_backup` longtext NOT NULL,
  PRIMARY KEY (`ph_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages_niceurls`
--

CREATE TABLE IF NOT EXISTS `pages_niceurls` (
  `pnu_id` int(11) NOT NULL AUTO_INCREMENT,
  `pnu_siteId` int(11) NOT NULL,
  `pnu_md5` varchar(32) NOT NULL,
  `pnu_nice_url` text NOT NULL,
  `pnu_p_id` int(11) NOT NULL,
  `pnu_lang` varchar(2) NOT NULL,
  `pnu_settings_serialized` text NOT NULL,
  `pnu_wz_w_id` int(11) NOT NULL DEFAULT '0' COMMENT 'wizard id',
  `pnu_wz_r_id` int(11) NOT NULL DEFAULT '0' COMMENT 'record id',
  `pnu_wz_c_id` int(11) NOT NULL DEFAULT '0' COMMENT 'categorie as_id',
  `pnu_wz_t_id` int(11) NOT NULL DEFAULT '0' COMMENT 'title as_id',
  `pnu_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `pnu_sort` int(11) NOT NULL,
  PRIMARY KEY (`pnu_id`),
  KEY `pnu_md5` (`pnu_md5`),
  KEY `pnu_p_id` (`pnu_p_id`),
  KEY `pnu_siteId` (`pnu_siteId`),
  KEY `xredaktor_niceurl::cache_exists($URL)` (`pnu_siteId`,`pnu_md5`,`pnu_del`),
  KEY `pnu_siteId_2` (`pnu_siteId`,`pnu_md5`,`pnu_wz_w_id`,`pnu_wz_r_id`),
  KEY `pnu_siteId_3` (`pnu_siteId`,`pnu_md5`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11897 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages_niceurls_match`
--

CREATE TABLE IF NOT EXISTS `pages_niceurls_match` (
  `pnm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pnm_name` varchar(255) NOT NULL,
  `pnm_fid` int(11) NOT NULL,
  `pnm_sort` int(11) NOT NULL,
  `pnm_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `pnm_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `pnm_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pnm_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pnm_http_code` enum('301','410','404') NOT NULL DEFAULT '301',
  `pnm_url_match` tinytext NOT NULL,
  `pnm_url_transport` tinytext NOT NULL,
  `pnm_siteId` int(11) NOT NULL,
  PRIMARY KEY (`pnm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=301 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages_settings_atoms`
--

CREATE TABLE IF NOT EXISTS `pages_settings_atoms` (
  `psa_id` int(11) NOT NULL AUTO_INCREMENT,
  `psa_fid` int(11) NOT NULL DEFAULT '0',
  `psa_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `psa_p_id` int(11) NOT NULL,
  `psa_a_id` int(11) NOT NULL,
  `psa_as_id` int(11) NOT NULL,
  `psa_json_cfg` longtext NOT NULL,
  `psa_inline_a_id` int(11) NOT NULL DEFAULT '0',
  `psa_sort` int(11) NOT NULL DEFAULT '0',
  `psa_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `psa_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `psa_tm_id` int(11) NOT NULL,
  PRIMARY KEY (`psa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1247 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_s_id` int(11) NOT NULL,
  `r_isOnline` enum('Y','N') NOT NULL DEFAULT 'N',
  `r_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `r_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `r_sort` int(11) NOT NULL DEFAULT '99999999',
  `r_name` varchar(255) NOT NULL,
  `r_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `r_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `r_lastmodBy` int(11) NOT NULL,
  `r_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles_settings`
--

CREATE TABLE IF NOT EXISTS `roles_settings` (
  `rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `rs_s_id` int(11) NOT NULL,
  `rs_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_r_id` int(11) NOT NULL DEFAULT '-1' COMMENT 'role',
  `rs_x_read` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_insert` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_update` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_delete` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_recursive` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_tag` varchar(255) NOT NULL,
  `rs_f_tid` int(11) NOT NULL DEFAULT '-1' COMMENT 'foreign table id',
  `rs_f_rid` int(11) NOT NULL DEFAULT '-1' COMMENT 'foreign record id',
  PRIMARY KEY (`rs_id`),
  KEY `rs_r_id` (`rs_r_id`,`rs_tag`,`rs_f_rid`),
  KEY `rs_r_id_2` (`rs_r_id`,`rs_tag`,`rs_f_tid`,`rs_f_rid`),
  KEY `rs_s_id` (`rs_s_id`,`rs_tag`,`rs_f_rid`),
  KEY `rs_s_id_2` (`rs_s_id`,`rs_del`,`rs_r_id`,`rs_x_read`,`rs_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=530 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles_tags`
--

CREATE TABLE IF NOT EXISTS `roles_tags` (
  `rt_id` int(11) NOT NULL AUTO_INCREMENT,
  `rt_sys_tag` enum('Y','N') NOT NULL DEFAULT 'N',
  `rt_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `rt_tag` varchar(255) NOT NULL,
  `rt_tag_human` varchar(255) NOT NULL,
  PRIMARY KEY (`rt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles_tags_user`
--

CREATE TABLE IF NOT EXISTS `roles_tags_user` (
  `rtu_id` int(11) NOT NULL AUTO_INCREMENT,
  `rtu_rt_id` int(11) NOT NULL,
  `rtu_u_id` int(11) NOT NULL,
  PRIMARY KEY (`rtu_id`),
  KEY `rtu_u_id` (`rtu_u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1643 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles_user`
--

CREATE TABLE IF NOT EXISTS `roles_user` (
  `ru_id` int(11) NOT NULL AUTO_INCREMENT,
  `ru_u_id` int(11) NOT NULL,
  `ru_r_id` int(11) NOT NULL,
  `ru_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ru_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`ru_id`),
  KEY `ru_u_id` (`ru_u_id`,`ru_r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_defaultSite` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_fid` int(11) NOT NULL,
  `s_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_sort` int(11) NOT NULL,
  `s_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_name` varchar(255) NOT NULL,
  `s_p_id` int(11) NOT NULL COMMENT 'RootPage',
  `s_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_maintenance` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_s_storage_scope` int(11) NOT NULL,
  `s_error_p_id` int(11) NOT NULL,
  `s_maintenance_p_id` int(11) NOT NULL,
  `s_suffix` varchar(255) NOT NULL,
  `s_redirectTLP` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_redirectTLP_domain` text NOT NULL,
  `s_robots_txt` longtext NOT NULL,
  `s_mail_from_name` text NOT NULL,
  `s_mail_from_email` text NOT NULL,
  `s_mail_smtp_server` text NOT NULL,
  `s_mail_smtp_user` text NOT NULL,
  `s_mail_smtp_pwd` text NOT NULL,
  `s_errorPage_mailing` int(11) NOT NULL,
  `s_errorPage_internalError` int(11) NOT NULL,
  `s_html_editor` longtext NOT NULL,
  `s_p_id_mobile` int(11) NOT NULL,
  `s_p_id_outofdate` int(11) NOT NULL,
  `s_humans_txt` longtext NOT NULL,
  `s_default_lang` varchar(2) NOT NULL,
  `s_mail_smtp_server_port` text NOT NULL,
  `s_mail_smtp_server_auth` text NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `s_defaultSite` (`s_defaultSite`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites_be_languages`
--

CREATE TABLE IF NOT EXISTS `sites_be_languages` (
  `sbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `sbl_s_id` int(11) NOT NULL,
  `sbl_bl_id` int(11) NOT NULL,
  `sbl_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sbl_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sbl_fid` int(11) NOT NULL,
  `sbl_sort` int(11) NOT NULL,
  `sbl_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sbl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sbl_lastModBy` int(11) NOT NULL,
  `sbl_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`sbl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites_faces`
--

CREATE TABLE IF NOT EXISTS `sites_faces` (
  `sf_id` int(11) NOT NULL AUTO_INCREMENT,
  `sf_s_id` int(11) NOT NULL,
  `sf_f_id` int(11) NOT NULL,
  `sf_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sf_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sf_fid` int(11) NOT NULL,
  `sf_sort` int(11) NOT NULL,
  `sf_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sf_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sf_lastModBy` int(11) NOT NULL,
  `sf_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites_fe_languages`
--

CREATE TABLE IF NOT EXISTS `sites_fe_languages` (
  `sfl_id` int(11) NOT NULL AUTO_INCREMENT,
  `sfl_s_id` int(11) NOT NULL,
  `sfl_fl_id` int(11) NOT NULL,
  `sfl_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sfl_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sfl_fid` int(11) NOT NULL,
  `sfl_sort` int(11) NOT NULL,
  `sfl_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sfl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sfl_lastModBy` int(11) NOT NULL,
  `sfl_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`sfl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_dir` enum('Y','N') NOT NULL DEFAULT 'Y',
  `s_storage_scope` int(255) NOT NULL,
  `s_isOnline` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `s_sort` int(11) NOT NULL DEFAULT '99999999',
  `s_nice_hash_cz` tinytext NOT NULL,
  `s_nice_url_cz` tinytext NOT NULL,
  `s_nice_hash_ro` tinytext NOT NULL,
  `s_nice_url_ro` tinytext NOT NULL,
  `s_nice_hash_ru` tinytext NOT NULL,
  `s_nice_url_ru` tinytext NOT NULL,
  `s_nice_hash_hu` tinytext NOT NULL,
  `s_nice_url_hu` tinytext NOT NULL,
  `s_nice_hash_it` tinytext NOT NULL,
  `s_nice_url_it` tinytext NOT NULL,
  `s_nice_hash_fr` tinytext NOT NULL,
  `s_nice_url_fr` tinytext NOT NULL,
  `s_nice_hash_en` tinytext NOT NULL,
  `s_nice_url_en` tinytext NOT NULL,
  `s_nice_hash_de` tinytext NOT NULL,
  `s_nice_url_de` tinytext NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_name_cz` tinytext NOT NULL,
  `s_name_ro` tinytext NOT NULL,
  `s_name_ru` tinytext NOT NULL,
  `s_name_hu` tinytext NOT NULL,
  `s_name_it` tinytext NOT NULL,
  `s_name_fr` tinytext NOT NULL,
  `s_name_en` tinytext NOT NULL,
  `s_name_de` tinytext NOT NULL,
  `s_onDisk` text NOT NULL,
  `s_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_lastmodBy` int(11) NOT NULL,
  `s_createdBy` int(11) NOT NULL,
  `s_fileSizeBytes` int(11) NOT NULL,
  `s_fileSizeBytesHuman` varchar(50) NOT NULL,
  `s_mimeType` varchar(255) NOT NULL,
  `s_media_w` int(11) NOT NULL,
  `s_media_h` int(11) NOT NULL,
  `s_alts` longtext NOT NULL,
  `s_del_soft` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_del_hard` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_del_softBy` int(11) NOT NULL,
  `s_del_hardBy` int(11) NOT NULL,
  `s_name_bb` tinytext NOT NULL,
  `s_version` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1123 ;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `storage_groups`
--

CREATE TABLE IF NOT EXISTS `storage_groups` (
  `sg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sg_moveAble` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `sg_fid` int(11) NOT NULL,
  `sg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_cz` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_ro` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_ru` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_hu` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_it` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_fr` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_en` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_de` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_del` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `sg_sort` int(11) NOT NULL,
  `sg_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sg_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sg_lastModBy` int(11) NOT NULL,
  `sg_createdBy` int(11) NOT NULL,
  `sg_dirname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_bb` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- --------------------------------------------------------

-----------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `sys_tags`
--

CREATE TABLE IF NOT EXISTS `sys_tags` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_fid` int(11) NOT NULL,
  `sys_sort` int(11) NOT NULL,
  `sys_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sys_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sys_lastChangedBy` int(11) NOT NULL,
  `sys_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sys_createdBy` int(11) NOT NULL,
  `sys_found` enum('Y','N') NOT NULL DEFAULT 'N',
  `sys_foundFile` tinytext NOT NULL,
  `sys_type` enum('AUTO','MANUAL') NOT NULL DEFAULT 'AUTO',
  `sys_exportAlways` enum('Y','N') NOT NULL DEFAULT 'N',
  `sys_tag` varchar(255) NOT NULL,
  `sys_tag_md5` varchar(50) NOT NULL,
  `sys_t_de` tinytext NOT NULL,
  `sys_t_cz` tinytext NOT NULL,
  `sys_t_hu` tinytext NOT NULL,
  `sys_t_bb` tinytext NOT NULL,
  `sys_t_xx` tinytext NOT NULL,
  `sys_t_en` tinytext NOT NULL,
  `sys_t_ru` tinytext NOT NULL,
  `sys_t_it` tinytext NOT NULL,
  `sys_t_fr` tinytext NOT NULL,
  `sys_t_ro` tinytext NOT NULL,
  PRIMARY KEY (`sys_id`),
  UNIQUE KEY `bet_tag_md5` (`sys_tag_md5`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `timemachine`
--

CREATE TABLE IF NOT EXISTS `timemachine` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_s_id` int(11) NOT NULL,
  `tm_name` varchar(255) NOT NULL,
  `tm_desc` varchar(255) NOT NULL,
  `tm_sort` int(11) NOT NULL,
  `tm_fid` int(11) NOT NULL,
  `tm_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tm_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tm_lastModBy` int(11) NOT NULL,
  `tm_createdBy` int(11) NOT NULL,
  `tm_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `tm_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `tm_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tm_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `xcore_internal_reporting`
--

CREATE TABLE IF NOT EXISTS `xcore_internal_reporting` (
  `xir_id` int(11) NOT NULL AUTO_INCREMENT,
  `xir_ns` varchar(255) NOT NULL,
  `xir_type` enum('ERROR','INFO','WARNING') NOT NULL,
  `xir_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xir_ip` int(11) NOT NULL,
  `xir_host` int(11) NOT NULL,
  `xir_hr` varchar(255) NOT NULL,
  `xir_no` varchar(255) NOT NULL,
  `xir_error` text NOT NULL,
  PRIMARY KEY (`xir_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `xgo_version_info`
--

CREATE TABLE IF NOT EXISTS `xgo_version_info` (
  `xgvi_id` int(11) NOT NULL AUTO_INCREMENT,
  `xgvi_notes` text NOT NULL,
  PRIMARY KEY (`xgvi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=226 ;


CREATE TABLE IF NOT EXISTS `xm_be_logs` (
  `xmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmbl_scope` varchar(256) NOT NULL,
  `xmbl_function` varchar(256) NOT NULL,
  `xmbl_ip` varchar(256) NOT NULL,
  `xmbl_host` varchar(256) NOT NULL,
  `xmbl_user_id` int(11) NOT NULL,
  `xmbl_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xmbl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94669 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_cronjobs`
--

CREATE TABLE IF NOT EXISTS `xm_cronjobs` (
  `xmc_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmc_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmc_ip` char(15) NOT NULL,
  `xmc_bounces_cnt_connectors` int(11) NOT NULL,
  `xmc_bounces_popping_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmc_bounces_popping_duration` int(11) NOT NULL,
  PRIMARY KEY (`xmc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80943 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_cronjobs_logs`
--

CREATE TABLE IF NOT EXISTS `xm_cronjobs_logs` (
  `xmcl_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmcl_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmcl_e_id` int(11) NOT NULL,
  `xmcl_e_left_open` int(11) NOT NULL,
  `xmcl_CRON_SLOT_ID` int(11) NOT NULL,
  PRIMARY KEY (`xmcl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=776 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_cronjobs_slots`
--

CREATE TABLE IF NOT EXISTS `xm_cronjobs_slots` (
  `xmcs_id` int(11) NOT NULL,
  `xmcs_last_call` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xmcs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xm_emissions`
--

CREATE TABLE IF NOT EXISTS `xm_emissions` (
  `xme_id` int(11) NOT NULL AUTO_INCREMENT,
  `xme_s_id` int(11) NOT NULL,
  `xme_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xme_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xme_sort` int(11) NOT NULL DEFAULT '99999999',
  `xme_name` varchar(255) NOT NULL,
  `xme_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xme_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xme_lastmodBy` int(11) NOT NULL,
  `xme_createdBy` int(11) NOT NULL,
  `xme_p_id` int(11) NOT NULL,
  `xme_subject` text NOT NULL,
  `xme_state` enum('CONFIG','SENDING','DONE','PAUSE','START_SENDING','READY_4_SENDING') NOT NULL DEFAULT 'CONFIG',
  `xme_tested` int(11) NOT NULL,
  `xme_q_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xme_q_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xme_q_time` int(11) NOT NULL,
  `xme_q_error` text NOT NULL,
  `xme_attach` text NOT NULL,
  PRIMARY KEY (`xme_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1035 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_emissions_lists`
--

CREATE TABLE IF NOT EXISTS `xm_emissions_lists` (
  `xmel_id` int(11) NOT NULL,
  `xmel_e_id` int(11) NOT NULL,
  `xmel_l_id` int(11) NOT NULL,
  KEY `xmel_e_id` (`xmel_e_id`,`xmel_l_id`),
  KEY `xmel_e_id_2` (`xmel_e_id`),
  KEY `xmel_l_id` (`xmel_l_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xm_emissions_senders`
--

CREATE TABLE IF NOT EXISTS `xm_emissions_senders` (
  `xmes_id` int(11) NOT NULL,
  `xmes_e_id` int(11) NOT NULL,
  `xmes_s_id` int(11) NOT NULL 
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xm_lists`
--

CREATE TABLE IF NOT EXISTS `xm_lists` (
  `xml_id` int(11) NOT NULL AUTO_INCREMENT,
  `xml_s_id` int(11) NOT NULL,
  `xml_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xml_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xml_sort` int(11) NOT NULL DEFAULT '99999999',
  `xml_name` varchar(255) NOT NULL,
  `xml_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xml_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xml_lastmodBy` int(11) NOT NULL,
  `xml_createdBy` int(11) NOT NULL,
  `xml_type` enum('LOCAL','REMOTE','TEST') NOT NULL DEFAULT 'LOCAL',
  `xml_remote_endpoint_sync` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `xml_remote_endpoint_sync_min` int(11) NOT NULL,
  `xml_remote_endpoint_url` text NOT NULL,
  `xml_remote_endpoint_security` text NOT NULL,
  `xml_remote_latest_sync` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xml_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=822 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_lists_import`
--

CREATE TABLE IF NOT EXISTS `xm_lists_import` (
  `xmli_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmli_s_id` int(11) NOT NULL,
  `xmli_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmli_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmli_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmli_file_name` text NOT NULL,
  `xmli_file_size` int(11) NOT NULL,
  `xmli_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmli_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmli_lastmodBy` int(11) NOT NULL,
  `xmli_createdBy` int(11) NOT NULL,
  `xmli_state` enum('OK','ERROR','PROCESSING','NOTSET','CANCELED','UPLOADED') NOT NULL DEFAULT 'NOTSET',
  `xmli_state_detail` text NOT NULL,
  `xmli_state_new` int(11) NOT NULL,
  `xmli_state_updated` int(11) NOT NULL,
  `xmli_state_failures` int(11) NOT NULL,
  `xmli_state_nochanges` int(11) NOT NULL,
  `xmli_state_duplicates` int(11) NOT NULL,
  `xmli_state_duplicates_mails` text NOT NULL,
  `xmli_ip` varchar(25) NOT NULL,
  `xmli_host` text NOT NULL,
  `xmli_l_id` int(11) NOT NULL,
  `xmli_feedbackImporter` text NOT NULL,
  `xmli_processed_line` int(11) NOT NULL,
  `xmli_errors` longtext NOT NULL,
  `xmli_type` enum('LOCAL','REMOTE') NOT NULL DEFAULT 'LOCAL',
  PRIMARY KEY (`xmli_id`),
  KEY `xmli_s_id` (`xmli_s_id`,`xmli_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3649 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_lists_remote`
--

CREATE TABLE IF NOT EXISTS `xm_lists_remote` (
  `xmlr_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmlr_s_id` int(11) NOT NULL,
  `xmlr_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmlr_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmlr_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmlr_name` varchar(255) NOT NULL,
  `xmlr_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmlr_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmlr_lastmodBy` int(11) NOT NULL,
  `xmlr_createdBy` int(11) NOT NULL,
  `xmlr_ts_fetch` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmlr_ts_download_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmlr_ts_download_time` int(11) NOT NULL,
  `xmlr_pre_check` enum('OK','NOK','DOWNLOADING','ERROR_STORING_DOWNLOAD','EMPTY_URL','UPLOAD_HANDLER_ERROR','NOT_ACTIVE','INVALID_URL') NOT NULL,
  `xmlr_error` text NOT NULL,
  `xmlr_cfg_url` text NOT NULL,
  `xmlr_cfg_secret` text NOT NULL,
  `xmlr_cfg_xml_id` int(11) NOT NULL,
  `xmlr_xmli_id` int(11) NOT NULL,
  `xmlr_caller` enum('AUTO','MANUAL') NOT NULL DEFAULT 'AUTO',
  PRIMARY KEY (`xmlr_id`),
  KEY `xmlr_s_id` (`xmlr_s_id`,`xmlr_del`),
  KEY `xmlr_s_id_2` (`xmlr_s_id`,`xmlr_del`,`xmlr_cfg_xml_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3555 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_recipients`
--

CREATE TABLE IF NOT EXISTS `xm_recipients` (
  `xmr_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmr_s_id` int(11) NOT NULL,
  `xmr_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmr_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmr_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmr_name` varchar(255) NOT NULL,
  `xmr_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmr_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmr_lastmodBy` int(11) NOT NULL,
  `xmr_createdBy` int(11) NOT NULL,
  `wz_id` int(11) NOT NULL,
  `xmr_name_first` varchar(256) NOT NULL,
  `xmr_name_last` varchar(256) NOT NULL,
  `xmr_email` varchar(256) NOT NULL,
  `xmr_type` enum('W','M','F','C','X') NOT NULL DEFAULT 'X',
  `xmr_title_pre` varchar(256) NOT NULL,
  `xmr_title_post` varchar(256) NOT NULL,
  `xmr_full_salutation` varchar(256) NOT NULL,
  `xmr_canceled` enum('N','Y') NOT NULL DEFAULT 'N',
  `xmr_canceled_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmr_lang` int(11) NOT NULL,
  `xmr_origin` enum('I','M','U') NOT NULL DEFAULT 'U',
  `xmr_origin_id` int(11) NOT NULL,
  PRIMARY KEY (`xmr_id`),
  KEY `userExistsByEMail` (`xmr_s_id`,`xmr_del`,`xmr_email`(200)),
  KEY `xmr_id` (`xmr_id`,`xmr_del`,`xmr_canceled`),
  KEY `xmr_s_id` (`xmr_s_id`),
  KEY `xmr_s_id_2` (`xmr_s_id`,`xmr_del`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157341 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_recipients2lists`
--

CREATE TABLE IF NOT EXISTS `xm_recipients2lists` (
  `xmr2l_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmr2l_s_id` int(11) NOT NULL,
  `xmr2l_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmr2l_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmr2l_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmr2l_name` varchar(255) NOT NULL,
  `xmr2l_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmr2l_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmr2l_lastmodBy` int(11) NOT NULL,
  `xmr2l_createdBy` int(11) NOT NULL,
  `xmr2l_l_id` int(11) NOT NULL,
  `xmr2l_r_id` int(11) NOT NULL,
  PRIMARY KEY (`xmr2l_id`),
  KEY `xmr2l_s_id` (`xmr2l_s_id`,`xmr2l_del`,`xmr2l_l_id`,`xmr2l_r_id`),
  KEY `xmr2l_s_id_2` (`xmr2l_s_id`),
  KEY `xmr2l_del` (`xmr2l_del`,`xmr2l_l_id`,`xmr2l_r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129825 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_recipients_history`
--

CREATE TABLE IF NOT EXISTS `xm_recipients_history` (
  `xmrh_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmrh_s_id` int(11) NOT NULL,
  `xmrh_xmr_id` int(11) NOT NULL,
  `xmrh_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmrh_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmrh_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmrh_name` varchar(255) NOT NULL,
  `xmrh_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmrh_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmrh_lastmodBy` int(11) NOT NULL,
  `xmrh_createdBy` int(11) NOT NULL,
  `wz_id` int(11) NOT NULL,
  `xmrh_r_id` int(11) NOT NULL,
  `xmrh_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmrh_beu_id` int(11) NOT NULL,
  `xmrh_beu_name` tinytext NOT NULL,
  `xmrh_action` longtext NOT NULL,
  `xmrh_details` longtext NOT NULL,
  `xmrh_import_id` int(11) NOT NULL,
  PRIMARY KEY (`xmrh_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=325523 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_send_connectors`
--

CREATE TABLE IF NOT EXISTS `xm_send_connectors` (
  `xmsc_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmsc_s_id` int(11) NOT NULL,
  `xmsc_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmsc_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmsc_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmsc_name` varchar(255) NOT NULL,
  `xmsc_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmsc_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsc_lastmodBy` int(11) NOT NULL,
  `xmsc_createdBy` int(11) NOT NULL,
  `xmsc_smtp_host` tinytext NOT NULL,
  `xmsc_smtp_user` tinytext NOT NULL,
  `xmsc_smtp_pwd` tinytext NOT NULL,
  `xmsc_smtp_limit_time` int(11) NOT NULL,
  `xmsc_smtp_limit_cnt` int(11) NOT NULL,
  `xmsc_from_mail` tinytext NOT NULL,
  `xmsc_from_name` tinytext NOT NULL,
  `xmsc_reply_mail` tinytext NOT NULL,
  `xmsc_reply_name` tinytext NOT NULL,
  `xmsc_pop_host` tinytext NOT NULL,
  `xmsc_pop_user` tinytext NOT NULL,
  `xmsc_pop_password` tinytext NOT NULL,
  `xmsc_pop_active` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmsc_last_popped` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xmsc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_send_connectors_bounces`
--

CREATE TABLE IF NOT EXISTS `xm_send_connectors_bounces` (
  `xmscb_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmscb_s_id` int(11) NOT NULL,
  `xmscb_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmscb_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmscb_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmscb_name` varchar(255) NOT NULL,
  `xmscb_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmscb_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmscb_lastmodBy` int(11) NOT NULL,
  `xmscb_createdBy` int(11) NOT NULL,
  `xmscb_r_id` int(11) NOT NULL,
  `xmscb_r_email` text NOT NULL,
  `xmscb_e_id` int(11) NOT NULL,
  `xmscb_q_id` int(11) NOT NULL,
  `xmscb_html` longtext NOT NULL,
  `xmscb_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmscb_json_full` longtext NOT NULL,
  `xmscb_message_id` text NOT NULL,
  `xmscb_valid` enum('N','Y') NOT NULL DEFAULT 'N',
  `xmscb_xmsc_id` int(11) NOT NULL,
  `xmscb_subject` text NOT NULL,
  PRIMARY KEY (`xmscb_id`),
  KEY `xmscb_r_id` (`xmscb_r_id`,`xmscb_e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28271 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_send_connectors_popping`
--

CREATE TABLE IF NOT EXISTS `xm_send_connectors_popping` (
  `xmscp_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmscp_xmsc_id` int(11) NOT NULL,
  `xmscp_xmsc_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmscp_xmsc_duration` int(11) NOT NULL,
  `xmscp_xmsc_mails_ok` int(11) NOT NULL,
  `xmscp_xmsc_mails_nok` int(11) NOT NULL,
  `xmscp_initiator` enum('MANUAL','CRON','UNSET') NOT NULL DEFAULT 'UNSET',
  PRIMARY KEY (`xmscp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38510 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_send_queue`
--

CREATE TABLE IF NOT EXISTS `xm_send_queue` (
  `xmsq_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmsq_s_id` int(11) NOT NULL,
  `xmsq_e_id` int(11) NOT NULL,
  `xmsq_r_id` int(11) NOT NULL,
  `xmsq_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmsq_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmsq_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_subject` mediumtext NOT NULL,
  `xmsq_html` blob NOT NULL,
  `xmsq_state` enum('Q','S','E1','E2','E3','EE','E_SMTP_CONFIG','E_IMAGE_NOT_FOUND','WAIT_4_Q','SALUTATION_EMPTY','EMAIL_ERROR') NOT NULL DEFAULT 'WAIT_4_Q',
  `xmsq_smtp_last_contact` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_Q` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_S` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_E1` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_E2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_E3` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_EE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_error_h` text NOT NULL,
  `xmsq_mine` varchar(256) NOT NULL,
  PRIMARY KEY (`xmsq_id`),
  KEY `xmsq_s_id` (`xmsq_s_id`,`xmsq_e_id`,`xmsq_r_id`),
  KEY `xmsq_e_id` (`xmsq_e_id`),
  KEY `xmsq_e_id_2` (`xmsq_e_id`,`xmsq_state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=794892 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_tracking_clicks`
--

CREATE TABLE IF NOT EXISTS `xm_tracking_clicks` (
  `xmtc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmtc_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmtc_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmtc_HTTP_USER_AGENT` tinytext NOT NULL COMMENT '938::TEXT:: HTTP_USER_AGENT',
  `xmtc_sq_id` int(11) NOT NULL COMMENT 'send que',
  `xmtc_e_id` int(11) NOT NULL,
  `xmtc_r_id` int(11) NOT NULL,
  `xmtc_link_id` int(11) NOT NULL COMMENT '940::WIZARD:: link_id',
  `xmtc_ip` tinytext NOT NULL COMMENT '941::TEXT:: ip',
  `xmtc_host` tinytext NOT NULL COMMENT '942::TEXT:: host',
  `xmtc_ref` tinytext NOT NULL COMMENT '945::TEXT:: ref',
  PRIMARY KEY (`xmtc_id`),
  KEY `xmtc_e_id` (`xmtc_e_id`),
  KEY `xmtc_e_id_2` (`xmtc_e_id`,`xmtc_r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='COMMENT' AUTO_INCREMENT=42541 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_tracking_links`
--

CREATE TABLE IF NOT EXISTS `xm_tracking_links` (
  `xmtl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmtl_s_id` int(11) NOT NULL,
  `xmtl_e_id` int(11) NOT NULL,
  `xmtl_sort` int(11) NOT NULL COMMENT 'SORT',
  `xmtl_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `xmtl_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmtl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmtl_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `xmtl_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `xmtl_tl_title` tinytext NOT NULL COMMENT '839::TEXT:: Title - KEY',
  `xmtl_tl_url` tinytext NOT NULL COMMENT '747::TEXT:: Transport URL',
  `xmtl_tl_target` tinytext NOT NULL COMMENT '843::TEXT:: Transport Target',
  `xmtl_tl_urlOrig` tinytext NOT NULL COMMENT '937::TEXT:: Original URL',
  PRIMARY KEY (`xmtl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='COMMENT' AUTO_INCREMENT=80538 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_tracking_opening_rates`
--

CREATE TABLE IF NOT EXISTS `xm_tracking_opening_rates` (
  `xmor_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmor_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `xmor_sort` int(11) NOT NULL COMMENT 'SORT',
  `xmor_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `xmor_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `xmor_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmor_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmor_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `xmor_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `xmor_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `xmor_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `xmor_HTTP_USER_AGENT` longtext NOT NULL COMMENT '913::TEXTAREA:: HTTP_USER_AGENT',
  `xmor_sq_id` int(11) NOT NULL COMMENT 'send que',
  `xmor_e_id` int(11) NOT NULL COMMENT 'emission id',
  `xmor_r_id` int(11) NOT NULL COMMENT 'reciepient',
  `xmor_ip` tinytext NOT NULL COMMENT '943::TEXT:: ip',
  `xmor_host` tinytext NOT NULL COMMENT '944::TEXT:: host',
  `xmor_ref` tinytext NOT NULL COMMENT '946::TEXT:: ref',
  PRIMARY KEY (`xmor_id`),
  KEY `xmor_e_id` (`xmor_e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='COMMENT' AUTO_INCREMENT=365377 ;

-- --------------------------------------------------------

--
-- Table structure for table `xm_tracking_unsubscription`
--

CREATE TABLE IF NOT EXISTS `xm_tracking_unsubscription` (
  `xmtu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmtu_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `xmtu_sort` int(11) NOT NULL COMMENT 'SORT',
  `xmtu_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `xmtu_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `xmtu_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmtu_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmtu_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `xmtu_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `xmtu_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `xmtu_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `xmtu_ts_unsub` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'unsub',
  `xmtu_e_id` int(11) NOT NULL COMMENT 'emission id',
  `xmtu_r_id` int(11) NOT NULL COMMENT 'recepit',
  PRIMARY KEY (`xmtu_id`),
  KEY `xmtu_e_id` (`xmtu_e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='COMMENT' AUTO_INCREMENT=189 ;

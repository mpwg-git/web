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

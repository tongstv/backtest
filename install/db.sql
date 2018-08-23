CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `tbl_demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbl_demo` (`id`, `fullname`, `phone`, `address`, `image`, `gioithieu`) VALUES
(2, 'trt', 'tr', 'trtr', '', ''),
(3, 'Trương Văn Tòng', '0914779999', 'Tòng STV', 'd87ca-mat-sau2.jpg', '');


CREATE TABLE IF NOT EXISTS `tbl_last_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-07 22:58:09'),
(2, 9, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Truong Van Tong\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-07 23:49:20'),
(3, 9, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Truong Van Tong\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-07 23:51:33'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-07 23:53:34'),
(5, 9, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Truong Van Tong\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-14 09:59:41'),
(6, 9, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Truong Van Tong\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-14 10:59:35'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.4.3282.236', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/70.4.236 Chrome/64.4.3282.236 Safari/537.36', 'Windows 8.1', '2018-07-14 11:00:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_reset_password`
--

CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_reset_password`
--

INSERT INTO `tbl_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'tongstv@gmail.com', 'K7Dn3aWC9cyorIs', 'Chrome 64.4.3282.236', '::1', 0, 1, '2018-07-07 18:49:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  PRIMARY KEY (`roleId`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=INNODB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@stv.vn', '$2y$10$4a6pUhjB.lKHcJRf3A0KROgwrk4164p01FDETEeKBRCRtbWCGRmcK', 'System Administrator', '0914779999', 1, 0, 0, '2015-07-01 18:56:49', 1, '2018-07-07 18:53:47'),
(9, 'tongstv@gmail.com', '$2y$10$QGWamMhM2KzjymbDT0AVOeg.EmEvcVXQt2q3aqBTA27QpPfuP1Liu', 'Truong Van Tong', '0914779999', 2, 0, 1, '2018-07-07 18:49:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_domains`
--

CREATE TABLE IF NOT EXISTS `tb_domains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `master_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slave_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url_check` text COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_domains`
--

INSERT INTO `tb_domains` (`id`, `domain`, `master_ip`, `slave_ip`, `url_check`, `content`) VALUES
(2, 'tongdailysim.com', 'dsd', 'sdsds', 'sds', 'sdsds');



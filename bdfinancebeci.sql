-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table bdfinancebeci. action_menus
CREATE TABLE IF NOT EXISTS `action_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_dev` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.action_menus : ~62 rows (environ)
INSERT INTO `action_menus` (`id`, `Menu`, `action`, `code_dev`, `statut`, `created_at`, `updated_at`) VALUES
	(3, '1', 'Ajouter rôles', 'add_role', NULL, '2022-06-14 13:56:34', '2022-06-14 13:56:34'),
	(4, '1', 'Modifier rôles', 'update_role', NULL, '2022-06-14 13:56:58', '2022-06-14 13:56:58'),
	(5, '1', 'Supprimer rôles', 'delete_role', NULL, '2022-06-14 13:57:26', '2022-06-14 13:57:26'),
	(6, '1', 'Attribuer rôle', 'menu_role', NULL, '2022-06-14 14:14:57', '2022-06-14 14:14:57'),
	(7, '2', 'Ajouter menu', 'add_menu', NULL, '2022-06-14 14:24:17', '2022-06-14 14:24:17'),
	(8, '2', 'Supprimer menu', 'delete_menu', NULL, '2022-06-14 14:24:48', '2022-06-14 14:24:48'),
	(9, '2', 'Modifier Menu', 'update_menu', NULL, '2022-06-14 14:25:21', '2022-06-14 14:25:21'),
	(10, '2', 'Ajouter action', 'action_menu', NULL, '2022-06-14 14:25:58', '2022-06-14 14:25:58'),
	(11, '3', 'Modifier utilisateur', 'update_user', NULL, '2022-06-14 14:32:19', '2022-06-14 14:32:19'),
	(12, '3', 'Supprimer utilisateur', 'delete_user', NULL, '2022-06-14 14:32:44', '2022-06-14 14:32:44'),
	(13, '3', 'Réinitialiser utilisateur', 'reset_user', NULL, '2022-06-14 14:33:07', '2022-06-14 14:33:07'),
	(14, '3', 'Statut utilisateur', 'status_user', NULL, '2022-06-14 14:33:41', '2022-06-14 14:33:41'),
	(15, '3', 'Ajouter utilisateur', 'add_user', NULL, '2022-06-14 14:34:46', '2022-06-14 14:34:46'),
	(16, '4', 'Ajouter entreprise', 'add_service', NULL, '2022-06-14 14:51:47', '2022-06-14 14:51:47'),
	(17, '4', 'Supprimer entreprise', 'delete_service', NULL, '2022-06-14 14:52:29', '2022-06-14 14:52:29'),
	(18, '4', 'Modifier entreprise', 'update_service', NULL, '2022-06-14 14:54:23', '2022-06-14 14:54:23'),
	(19, '5', 'Ajouter Hiérarchie', 'add_hie', NULL, '2022-06-14 14:55:34', '2022-06-14 14:55:34'),
	(20, '5', 'Supprimer hiérarchie', 'delete_hie', NULL, '2022-06-14 14:57:39', '2022-06-14 14:57:39'),
	(21, '5', 'Modifier hiérarchie', 'update_hie', NULL, '2022-06-14 14:58:01', '2022-06-14 14:58:01'),
	(22, '6', 'Ajouter catégorie', 'add_cat', NULL, '2022-06-14 15:00:35', '2022-06-14 15:00:35'),
	(23, '6', 'Modifier catégorie', 'update_cat', NULL, '2022-06-14 15:00:54', '2022-06-14 15:00:54'),
	(24, '6', 'Supprimer catégorie', 'delete_cat', NULL, '2022-06-14 15:01:11', '2022-06-14 15:01:11'),
	(25, '7', 'Ajouter incidents', 'add_incident', NULL, '2022-06-14 15:04:10', '2022-06-14 15:04:10'),
	(26, '7', 'Modifier incident', 'update_incident', NULL, '2022-06-14 15:04:34', '2022-06-14 15:04:34'),
	(27, '7', 'Supprimer incident', 'delete_incident', NULL, '2022-06-14 15:04:56', '2022-06-14 15:04:56'),
	(28, '8', 'Ajouter Incidents', 'add_incie', NULL, '2022-06-14 15:36:36', '2022-06-14 15:36:36'),
	(29, '8', 'Supprimer incident', 'delete_incie', NULL, '2022-06-14 15:45:19', '2022-06-14 15:45:19'),
	(30, '8', 'Modifier Incident', 'update_incie', NULL, '2022-06-14 15:45:50', '2022-06-14 15:45:50'),
	(31, '8', 'Modifier Etat', 'update_etat', NULL, '2022-06-14 15:46:24', '2022-06-14 15:46:24'),
	(32, '8', 'Affecter à un service', 'affec_incie', NULL, '2022-06-14 15:51:10', '2022-06-14 15:51:10'),
	(33, '11', '(action)', '(action dev)', NULL, '2022-07-21 13:56:53', '2022-07-21 13:56:53'),
	(36, '13', 'Action Menu', 'menu_role', NULL, '2022-08-30 16:32:08', '2022-08-30 16:32:08'),
	(37, '13', 'Ajouter un rôle', 'add_role', NULL, '2022-08-30 16:32:44', '2022-08-30 16:32:44'),
	(38, '13', 'Supprimer un rôle', 'delete_role', NULL, '2022-08-30 16:33:10', '2022-08-30 16:33:10'),
	(39, '13', 'Modifier un rôle', 'update_role', NULL, '2022-08-30 16:34:05', '2022-08-30 16:34:05'),
	(40, '15', 'Ajouter un outil', 'add_outil', NULL, '2023-09-07 23:27:14', '2023-09-07 23:27:14'),
	(41, '15', 'Modification de l\'état d\'outil', 'update_etat_outil', NULL, '2023-09-07 23:29:17', '2023-09-07 23:29:17'),
	(42, '15', 'Réaffectation d\'outil à un autre utilisateur', 'reaffecte_outil', NULL, '2023-09-07 23:30:19', '2023-09-07 23:30:19'),
	(43, '15', 'Affectation d\'outil à un utilisateur', 'affecte_outil', NULL, '2023-09-07 23:31:21', '2023-09-07 23:31:21'),
	(44, '15', 'Historique de l\'outil', 'hist_outil', NULL, '2023-09-07 23:33:54', '2023-09-07 23:33:54'),
	(45, '15', 'Caractéritiques d\'outils', 'caract_outil', NULL, '2023-09-07 23:35:52', '2023-09-07 23:35:52'),
	(46, '15', 'Modification des caractéristiques de l\'outil', 'update_caract_outil', NULL, '2023-09-07 23:38:18', '2023-09-07 23:38:18'),
	(47, '15', 'Suppression d\'outil', 'delete_outil', NULL, '2023-09-07 23:40:29', '2023-09-07 23:40:29'),
	(48, '16', 'Enregistrer un catégorie', 'add_cat_outil', NULL, '2023-09-07 23:42:43', '2023-09-07 23:42:43'),
	(49, '16', 'Modification de catégorie', 'update_cat_outil', NULL, '2023-09-07 23:43:22', '2023-09-07 23:43:22'),
	(50, '16', 'Suppression de catégorie', 'delete_cat_outil', NULL, '2023-09-07 23:44:18', '2023-09-07 23:44:18'),
	(51, '16', 'Définitions des champs caractéristisques de la catégorie d\'outil', 'define_champ_cat_outil', NULL, '2023-09-07 23:45:23', '2023-09-07 23:45:23'),
	(52, '17', 'Programmer une maintenance', 'prog_maint', NULL, '2023-09-07 23:47:28', '2023-09-07 23:47:28'),
	(53, '17', 'Définition de l\'état', 'define_etat_maint', NULL, '2023-09-07 23:48:36', '2023-09-07 23:48:36'),
	(54, '17', 'Imprimer l\'état de la maintenance globale d\'une période en pdf', 'etat_pdf_maint_global', NULL, '2023-09-07 23:50:12', '2023-09-07 23:50:12'),
	(55, '17', 'Imprimer l\'état de la maintenance globale d\'une période en excel', 'etat_excel_maint_global', NULL, '2023-09-07 23:51:08', '2023-09-07 23:51:08'),
	(56, '17', 'Afficher les détails de la maintenance d\'une période', 'see_detail_maint', NULL, '2023-09-07 23:51:53', '2023-09-07 23:51:53'),
	(57, '17', 'Modification d\'une maintenance programmer', 'update_maint_prog', NULL, '2023-09-07 23:53:24', '2023-09-07 23:53:24'),
	(58, '17', 'Supprimer une maintenance programmer', 'delete_maint_prog', NULL, '2023-09-07 23:54:10', '2023-09-07 23:54:10'),
	(59, '18', 'Imprimer l\'état de la maintenance d\'une période en pdf', 'print_maint_pdf', NULL, '2023-09-07 23:56:25', '2023-09-07 23:56:25'),
	(60, '18', 'Détails de la maintenance', 'detail_maint_user', NULL, '2023-09-07 23:58:00', '2023-09-07 23:58:00'),
	(61, '18', 'Commentaire', 'comment_maint_user', NULL, '2023-09-07 23:59:15', '2023-09-07 23:59:15'),
	(62, '17', 'Enregistrement de la maintenance effectuée', 'add_maint_outil', NULL, '2023-09-08 00:01:11', '2023-09-08 00:01:11'),
	(63, '17', 'Imprimer l\'état de la maintenance d\'une période en pdf', 'print_maint_admin_pdf', NULL, '2023-09-08 00:01:56', '2023-09-08 00:01:56'),
	(64, '17', 'Détails de la maintenance', 'detail_maint_admin', NULL, '2023-09-08 00:02:29', '2023-09-08 00:02:29'),
	(65, '17', 'Modification d\'une maintenance enregistrer', 'update_maint_admin', NULL, '2023-09-08 00:03:33', '2023-09-08 00:03:33'),
	(66, '17', 'Suppression d\'une maintenance enregistrer', 'delete_maint_admin', NULL, '2023-09-08 00:04:09', '2023-09-08 00:04:09');

-- Listage de la structure de table bdfinancebeci. action_menu_acces
CREATE TABLE IF NOT EXISTS `action_menu_acces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Menu` bigint unsigned DEFAULT NULL,
  `Role` bigint unsigned DEFAULT NULL,
  `ActionMenu` bigint unsigned DEFAULT NULL,
  `statut` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.action_menu_acces : ~117 rows (environ)
INSERT INTO `action_menu_acces` (`id`, `Menu`, `Role`, `ActionMenu`, `statut`, `created_at`, `updated_at`) VALUES
	(3, 1, 1, 0, 0, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(4, 1, 1, 3, 1, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(5, 1, 1, 4, 1, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(6, 1, 1, 5, 1, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(7, 1, 1, 6, 1, '2022-06-14 14:15:59', '2022-06-14 14:15:59'),
	(8, 2, 1, 0, 0, '2022-06-14 14:16:05', '2022-06-14 14:16:05'),
	(9, 2, 1, 7, 0, '2022-06-14 14:27:32', '2022-06-14 14:27:32'),
	(10, 2, 1, 8, 0, '2022-06-14 14:27:32', '2022-06-14 14:27:32'),
	(11, 2, 1, 9, 0, '2022-06-14 14:27:32', '2022-06-14 14:27:32'),
	(12, 2, 1, 10, 0, '2022-06-14 14:27:32', '2022-06-14 14:27:32'),
	(13, 3, 1, 0, 0, '2022-06-14 14:35:16', '2022-06-14 14:35:16'),
	(14, 3, 1, 11, 0, '2022-06-14 14:35:16', '2022-06-14 14:35:16'),
	(15, 3, 1, 12, 0, '2022-06-14 14:35:16', '2022-06-14 14:35:16'),
	(16, 3, 1, 13, 0, '2022-06-14 14:35:16', '2022-06-14 14:35:16'),
	(17, 3, 1, 14, 0, '2022-06-14 14:35:16', '2022-06-14 14:35:16'),
	(18, 3, 1, 15, 0, '2022-06-14 14:35:16', '2022-06-14 14:35:16'),
	(19, 4, 1, 0, 0, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(20, 5, 1, 0, 0, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(21, 6, 1, 0, 0, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(22, 4, 1, 16, 0, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(23, 4, 1, 17, 0, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(24, 4, 1, 18, 0, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(25, 5, 1, 19, 1, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(26, 5, 1, 20, 1, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(27, 5, 1, 21, 1, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(28, 6, 1, 22, 1, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(29, 6, 1, 23, 1, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(30, 6, 1, 24, 1, '2022-06-14 15:01:50', '2022-06-14 15:01:50'),
	(31, 7, 1, 0, 0, '2022-06-14 16:02:05', '2022-06-14 16:02:05'),
	(32, 8, 1, 0, 0, '2022-06-14 16:02:05', '2022-06-14 16:02:05'),
	(33, 7, 1, 25, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(34, 7, 1, 26, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(35, 7, 1, 27, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(36, 8, 1, 28, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(37, 8, 1, 29, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(38, 8, 1, 30, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(39, 8, 1, 31, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(40, 8, 1, 32, 1, '2022-06-14 16:02:06', '2022-06-14 16:02:06'),
	(41, 9, 1, 0, 0, '2022-06-15 08:46:59', '2022-06-15 08:46:59'),
	(42, 3, 2, 0, 0, '2022-06-15 08:48:24', '2022-06-15 08:48:24'),
	(43, 4, 2, 0, 0, '2022-06-15 08:48:24', '2022-06-15 08:48:24'),
	(44, 5, 2, 0, 0, '2022-06-15 08:48:24', '2022-06-15 08:48:24'),
	(45, 6, 2, 0, 0, '2022-06-15 08:48:24', '2022-06-15 08:48:24'),
	(46, 8, 2, 0, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(47, 9, 2, 0, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(48, 3, 2, 11, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(49, 3, 2, 12, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(50, 3, 2, 13, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(51, 3, 2, 14, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(52, 3, 2, 15, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(53, 4, 2, 16, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(54, 4, 2, 17, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(55, 4, 2, 18, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(56, 5, 2, 19, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(57, 5, 2, 20, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(58, 5, 2, 21, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(59, 6, 2, 22, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(60, 6, 2, 23, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(61, 6, 2, 24, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(62, 8, 2, 28, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(63, 8, 2, 29, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(64, 8, 2, 30, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(65, 8, 2, 31, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(66, 8, 2, 32, 0, '2022-06-15 08:48:25', '2022-06-15 08:48:25'),
	(67, 7, 4, 0, 0, '2022-06-15 11:18:15', '2022-06-15 11:18:15'),
	(68, 9, 4, 0, 0, '2022-06-15 11:18:15', '2022-06-15 11:18:15'),
	(69, 7, 4, 25, 0, '2022-06-15 11:18:15', '2022-06-15 11:18:15'),
	(70, 7, 4, 26, 0, '2022-06-15 11:18:15', '2022-06-15 11:18:15'),
	(71, 7, 4, 27, 0, '2022-06-15 11:18:15', '2022-06-15 11:18:15'),
	(72, 13, 1, 0, 0, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(73, 13, 1, 36, 0, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(74, 13, 1, 37, 0, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(75, 13, 1, 38, 0, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(76, 13, 1, 39, 0, '2022-06-14 14:05:38', '2022-06-14 14:05:38'),
	(77, 14, 1, 0, 0, '2022-09-06 07:07:19', '2022-09-06 07:07:19'),
	(78, 14, 2, 0, 0, '2022-09-06 07:07:50', '2022-09-06 07:07:50'),
	(79, 14, 4, 0, 0, '2022-09-06 07:08:04', '2022-09-06 07:08:04'),
	(80, 7, 2, 0, 0, '2023-07-04 10:17:47', '2023-07-04 10:17:47'),
	(81, 7, 2, 25, 0, '2023-07-04 10:17:47', '2023-07-04 10:17:47'),
	(82, 7, 2, 26, 0, '2023-07-04 10:17:47', '2023-07-04 10:17:47'),
	(83, 7, 2, 27, 0, '2023-07-04 10:17:47', '2023-07-04 10:17:47'),
	(84, 15, 1, 0, 0, '2023-08-03 17:27:31', '2023-08-03 17:27:31'),
	(85, 16, 1, 0, 0, '2023-08-29 14:37:32', '2023-08-29 14:37:32'),
	(86, 17, 1, 0, 0, '2023-09-01 21:38:36', '2023-09-01 21:38:36'),
	(87, 18, 1, 0, 0, '2023-09-02 11:35:38', '2023-09-02 11:35:38'),
	(88, 15, 1, 40, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(89, 15, 1, 41, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(90, 15, 1, 42, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(91, 15, 1, 43, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(92, 15, 1, 44, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(93, 15, 1, 45, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(94, 15, 1, 46, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(95, 15, 1, 47, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(96, 16, 1, 48, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(97, 16, 1, 49, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(98, 16, 1, 50, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(99, 16, 1, 51, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(100, 17, 1, 52, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(101, 17, 1, 53, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(102, 17, 1, 54, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(103, 17, 1, 55, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(104, 17, 1, 56, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(105, 17, 1, 57, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(106, 17, 1, 58, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(107, 17, 1, 62, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(108, 17, 1, 63, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(109, 17, 1, 64, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(110, 17, 1, 65, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(111, 17, 1, 66, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(112, 18, 1, 59, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(113, 18, 1, 60, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(114, 18, 1, 61, 1, '2023-09-08 00:06:19', '2023-09-08 00:06:19'),
	(115, 19, 1, 0, 0, '2023-10-28 11:11:38', '2023-10-28 11:11:38'),
	(116, 20, 1, 0, 0, '2023-10-28 11:11:38', '2023-10-28 11:11:38'),
	(117, 21, 1, 0, 0, '2023-10-28 11:11:38', '2023-10-28 11:11:38'),
	(118, 22, 1, 0, 0, '2023-10-28 11:11:38', '2023-10-28 11:11:38'),
	(119, 23, 1, 0, 0, '2023-10-28 11:45:37', '2023-10-28 11:45:37');

-- Listage de la structure de table bdfinancebeci. besoins
CREATE TABLE IF NOT EXISTS `besoins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dateemission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` bigint unsigned DEFAULT NULL,
  `urgence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.besoins : ~0 rows (environ)

-- Listage de la structure de table bdfinancebeci. lignebesoins
CREATE TABLE IF NOT EXISTS `lignebesoins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lignebudgetaire` bigint unsigned DEFAULT NULL,
  `quantite` int DEFAULT '0',
  `montant` int DEFAULT '0',
  `motif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `besoin` bigint unsigned DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.lignebesoins : ~0 rows (environ)

-- Listage de la structure de table bdfinancebeci. lignebudgetaires
CREATE TABLE IF NOT EXISTS `lignebudgetaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int DEFAULT '0',
  `montantalloue` int DEFAULT '0',
  `montantutilise` int DEFAULT '0',
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `souscompte` bigint unsigned DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.lignebudgetaires : ~0 rows (environ)

-- Listage de la structure de table bdfinancebeci. menus
CREATE TABLE IF NOT EXISTS `menus` (
  `idMenu` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelleMenu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Topmenu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_ordre` tinyint DEFAULT NULL,
  `order_ss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `element_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `action_save` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.menus : ~11 rows (environ)
INSERT INTO `menus` (`idMenu`, `libelleMenu`, `titre_page`, `controller`, `route`, `Topmenu_id`, `num_ordre`, `order_ss`, `iconee`, `element_menu`, `statut`, `user_action`, `action_save`, `created_at`, `updated_at`) VALUES
	(2, 'Menus', 'Liste des menus', NULL, 'GM', '0', 6, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 14:09:03', '2022-10-28 15:45:18'),
	(3, 'Utilisateurs', 'Liste des utilisateurs', NULL, 'GU', '0', 5, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 14:29:29', '2022-06-15 09:20:05'),
	(4, 'Entreprises', 'Entreprises', NULL, 'GS', '0', 3, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 14:36:18', '2023-10-04 22:32:19'),
	(9, 'Tableau de bord', 'Tableau de bord', NULL, 'dashboard', '0', 8, NULL, '#', '500', NULL, 1, NULL, '2022-06-15 08:38:30', '2022-07-21 13:46:43'),
	(13, 'Rôles', 'Rôles', NULL, 'GR', '0', 4, NULL, '#', NULL, NULL, 1, NULL, '2022-08-30 16:29:53', '2022-08-30 16:44:27'),
	(14, 'Aide', 'Aide', NULL, 'MAD', '0', 14, NULL, '#', '500', NULL, 1, NULL, '2022-09-06 07:06:46', '2022-09-06 07:06:46'),
	(19, 'Factures', 'Factures', NULL, 'GF', '0', 1, NULL, '#', '500', NULL, 1, NULL, '2023-10-28 11:08:14', '2023-10-28 11:08:14'),
	(20, 'Projets', 'Projets', NULL, 'GF', '0', 2, NULL, '#', '500', NULL, 1, NULL, '2023-10-28 11:08:48', '2023-10-28 11:08:48'),
	(21, 'Gestion Trésorerie', 'Gestion Trésorerie', NULL, 'GF', '0', 3, NULL, '#', '500', NULL, 1, NULL, '2023-10-28 11:10:17', '2023-10-28 11:10:17'),
	(22, 'Gestion budgétaire', 'Gestion budgétaire', NULL, 'GF', '0', 4, NULL, '#', '500', NULL, 1, NULL, '2023-10-28 11:10:51', '2023-10-28 11:10:51'),
	(23, 'Fournitures', 'Fournitures', NULL, 'GFT', '0', 3, NULL, '#', NULL, NULL, 1, NULL, '2023-10-28 11:44:20', '2023-10-28 11:44:20');

-- Listage de la structure de table bdfinancebeci. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.migrations : ~16 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_11_18_164633_create_utilisateurs_table', 1),
	(6, '2021_11_18_164842_create_roles_table', 1),
	(7, '2021_11_18_164907_create_menus_table', 1),
	(8, '2021_11_18_164945_create_action_menus_table', 1),
	(9, '2021_11_18_165017_create_action_menu_acces_table', 1),
	(10, '2021_11_18_165051_create_packs_table', 1),
	(11, '2021_11_18_165121_create_produits_table', 1),
	(12, '2021_11_18_175454_create_traces_table', 1),
	(13, '2022_03_30_150507_create_incidents_table', 2),
	(14, '2022_04_05_102321_create_categories_table', 3),
	(15, '2022_04_05_102426_create_hierarchies_table', 3),
	(16, '2022_04_07_102555_create_services_table', 4);

-- Listage de la structure de table bdfinancebeci. parcoursbesoins
CREATE TABLE IF NOT EXISTS `parcoursbesoins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `besoin` bigint unsigned DEFAULT NULL,
  `validateur` bigint unsigned DEFAULT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.parcoursbesoins : ~0 rows (environ)

-- Listage de la structure de table bdfinancebeci. personnels
CREATE TABLE IF NOT EXISTS `personnels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Entreprise` bigint unsigned DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificationpersonnel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalite` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taille` tinyint DEFAULT NULL,
  `electrophorese` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombreenfant` tinyint DEFAULT NULL,
  `groupesanguin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situationmatrimoniale` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnss` tinyint DEFAULT NULL,
  `eca_nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eca_lieu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eca_tel` tinyint DEFAULT NULL,
  `dateembauche` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datedepart` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motifdepart` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` int DEFAULT '0',
  `action` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.personnels : ~0 rows (environ)

-- Listage de la structure de table bdfinancebeci. provisions
CREATE TABLE IF NOT EXISTS `provisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `annee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `souscompte` bigint unsigned DEFAULT NULL,
  `montant` int DEFAULT '0',
  `soldedebut` int DEFAULT '0',
  `mois` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lignebudgetaire` bigint unsigned DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.provisions : ~0 rows (environ)

-- Listage de la structure de table bdfinancebeci. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `action_save` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.roles : ~3 rows (environ)
INSERT INTO `roles` (`idRole`, `libelle`, `code`, `user_action`, `action_save`, `created_at`, `updated_at`) VALUES
	(1, 'Développeur', 'dev', 1, NULL, '2022-02-10 18:54:21', '2022-02-10 18:54:21'),
	(2, 'Administrateur', 'admin', 1, NULL, '2022-02-10 18:59:32', '2022-02-10 20:02:04'),
	(4, 'Services', 'serv', 1, NULL, '2022-06-15 11:14:58', '2022-06-15 11:14:58');

-- Listage de la structure de table bdfinancebeci. services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chef` bigint DEFAULT NULL,
  `structure` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hierarchiedirection` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.services : ~1 rows (environ)
INSERT INTO `services` (`id`, `action`, `libelle`, `imma`, `chef`, `structure`, `hierarchiedirection`, `created_at`, `updated_at`) VALUES
	(9, '1', 'Direction Générale', '001', 1, 'DIRECTION', NULL, '2022-07-01 07:42:16', '2024-02-21 09:53:46');

-- Listage de la structure de table bdfinancebeci. souscomptes
CREATE TABLE IF NOT EXISTS `souscomptes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `compte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.souscomptes : ~4 rows (environ)
INSERT INTO `souscomptes` (`id`, `compte`, `user_action`, `created_at`, `updated_at`) VALUES
	(1, 'Fonctionnement', 1, NULL, NULL),
	(2, 'Social', 1, NULL, NULL),
	(3, 'Invertissement', 1, NULL, NULL),
	(4, 'Dividente', 1, NULL, NULL);

-- Listage de la structure de table bdfinancebeci. traces
CREATE TABLE IF NOT EXISTS `traces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idsec` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1720 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.traces : ~123 rows (environ)
INSERT INTO `traces` (`id`, `action`, `libelle`, `type`, `idsec`, `created_at`, `updated_at`) VALUES
	(1593, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 04-10-2023 à 22:50:41', '', NULL, '2023-10-04 21:50:41', '2023-10-04 21:50:41'),
	(1718, '1', 'Vous avez modifié le services Direction Générale .', '', NULL, '2024-02-21 08:55:20', '2024-02-21 08:55:20'),
	(1719, '1', 'Vous avez modifié le services Direction Générale .', '', NULL, '2024-02-21 09:53:46', '2024-02-21 09:53:46');

-- Listage de la structure de table bdfinancebeci. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUser` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` bigint unsigned DEFAULT NULL,
  `Service` bigint unsigned DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Societe` bigint unsigned DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activereceiveincident` tinyint DEFAULT '1',
  `user_action` bigint unsigned DEFAULT NULL,
  `action_save` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bdfinancebeci.utilisateurs : ~1 rows (environ)
INSERT INTO `utilisateurs` (`idUser`, `nom`, `prenom`, `sexe`, `tel`, `mail`, `adresse`, `login`, `password`, `Role`, `Service`, `other`, `signature`, `auth`, `Societe`, `image`, `activereceiveincident`, `user_action`, `action_save`, `statut`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'DJIDAGBAGBA', 'S T Emmanuel', 'M', '61310573', 'emmanueldjidagbagba@gmail.com', 'Cotonou', 'kanths', 'com8397c8070f8bb39004be88e3fe65d27f2e23f52fdste', 1, 9, 'Analyste Concepteur; Développeur; DBA Oracle; Formateur; ', NULL, NULL, NULL, NULL, 0, 1, 's', '0', NULL, '2022-01-26 09:06:01', '2023-10-04 21:15:40');
INSERT INTO `utilisateurs` (`idUser`, `nom`, `prenom`, `sexe`, `tel`, `mail`, `adresse`, `login`, `password`, `Role`, `Service`, `other`, `signature`, `auth`, `Societe`, `image`, `activereceiveincident`, `user_action`, `action_save`, `statut`, `remember_token`, `created_at`, `updated_at`) VALUES 
(NULL, 'Admin', 'S', 'M', '', 'admin@gmail.com', '', 'admin', 'com1d90bb34b6e547495665088ce2f70cd37fce6a58dste', '2', '9', '', NULL, '', '1', NULL, '1', '1', 's', '0', NULL, '2023-12-19 00:18:31', '2023-12-19 00:19:44')
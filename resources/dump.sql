CREATE DATABASE IF NOT EXISTS `koala` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `koala`;

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `status`  int(11) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_bin NOT NULL,
  `access_token` varchar(512) COLLATE utf8_bin NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `users`
--
INSERT INTO `users` (`id`, `username`, `password_hash`, `status`, `auth_key`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 'toto', '$2y$13$ET1yK9k4tgWs8N.gr8292.X7W71RuJE/0uWv06CrnJKZvyljOcSl6', 10, 'A1_JkgZ41rtqJN2FS3hVcN0QBl0TJtEn', 'P3I06ciZh7fbrWd9wibsCDkzi7_4VLkn', '1606404542', '1606404542');

ALTER TABLE `users`	ADD CONSTRAINT `users_pk` PRIMARY KEY (id);

ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
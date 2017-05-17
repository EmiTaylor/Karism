-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 14 Mai 2017 à 13:03
-- Version du serveur :  5.6.34
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exposmaison`
--

-- --------------------------------------------------------

--
-- Structure de la table `charte`
--

CREATE TABLE `charte` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `charte`
--

INSERT INTO `charte` (`id`, `titre`, `contenu`, `image`, `position`) VALUES
(1, '#1. La Confiance', 'Depuis 4 ans, Les EXPOS à la MAISON est un projet qui repose sur une relation de confiance. C’est ce qui a permis à chacun, artistes, hôtes et organisateurs d’avoir sa véritable place.\r\n\r\nLa sécurité\r\nNous sollicitons votre attention afin de respecter les propriétés, les biens et les personnes présentes pendant l’évènement. Mais aussi d’assurer un cadre qui vous permet d’être vous même en sécurité et qui protège les oeuvres.\r\n\r\nLe respect \r\nCette notion de respect est essentielle pour que chacun puisse participer à cette expérience. Nous refusons tout discours ou comportement qui pourrait porter atteinte à des personnes : injures, discriminations, discours haineux, intimidation, harcèlement, etc…\r\nNous portons également votre attention au respect du voisinage.\r\nSi vous avez un imprévu et devez impérativement annuler votre expo, nous vous conseillons de prévenir immédiatement l’artiste/le mécène d’un soir. Il sera ainsi plus facile pour lui de s’organiser.\r\n\r\nL’authenticité\r\nL’authenticité est primordiale. Nous vous demandons de trouver un juste équilibre entre envies personnelles, attentes convenables, échanges et communication.', NULL, 0),
(2, '#2. Rendre l’art accessible au plus grand nombre / Soutenir des artistes', 'Nous sommes intimement convaincus que nous pouvons tous être des mécènes d’un soir. Notre rêve est de pouvoir faire de la ville une grande galerie où chaque artiste aurait sa place. Si vous aussi, vous partagez ce rêve, si cela vous fait envie ou si tout simplement vous êtes curieux ; vous faites déjà parti de notre communauté !', NULL, 1),
(3, '#3. L’expérience', 'Le cœur de ce projet est la rencontre entre le travail d’un artiste et un hôte.\r\n\r\nL’échange et le partage sont les clés de ces événements. Nous sommes quelque part réunis pour vivre l’art différemment et pour vivre une expérience commune.\r\n\r\nArtistes, vous n’exposez pas dans une galerie traditionnelle. Hôtes, vous êtes une galerie éphémère et vivante. Les codes ne sont pas les mêmes. Pensez à être en phase avec l’événement et surtout à jouer le jeu.\r\n\r\nSi vous faites tout ça, on vous garantie que vous passerez un super bon moment.\r\n\r\nEt qui sait.. Artistes, peut être vous repartirez allégés de quelques oeuvres. Et vous hôtes avec quelques oeuvres, souvenirs qui donneront un nouveau goût à votre intérieur.\r\n', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `expositions`
--

CREATE TABLE `expositions` (
  `id` int(10) UNSIGNED NOT NULL,
  `placehote` int(11) NOT NULL,
  `artiste` int(11) NOT NULL,
  `date` date NOT NULL,
  `listeinvite` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `artistviewed` tinyint(1) NOT NULL,
  `hoteviewed` tinyint(1) NOT NULL,
  `checklistehote` tinyint(1) NOT NULL,
  `checklisteartist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `expositions`
--

INSERT INTO `expositions` (`id`, `placehote`, `artiste`, `date`, `listeinvite`, `status`, `artistviewed`, `hoteviewed`, `checklistehote`, `checklisteartist`) VALUES
(1, 1, 1, '2017-05-02', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `interrogation`
--

CREATE TABLE `interrogation` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `interrogation`
--

INSERT INTO `interrogation` (`id`, `titre`, `contenu`, `position`) VALUES
(1, 'Combien de personnes dois-je inviter ?', 'C’est vous le chef ! Vous êtes libre d’inviter 10 ou 100 personnes. Tant que ça rentre, faites vous plaisir !\r\nVous avez la possibilité de créer un événement privé ou de laisser quelques invitations à disposition de l’artiste.\r\n', 0),
(2, 'Vais-je devoir faire des trous dans mes murs ? ', 'Non ! Une de nos règles d’or est de ne faire aucun trous aux murs… \r\nVous dites à l’artiste vos conditions et ce dernier se chargera d’agencer ses oeuvres au plus près de vos conditions\r\n', 1),
(3, 'Pour accueillir un artiste, dois-je avoir un(e) grand(e) appartement / maison ?', 'Non ! Ce projet est ouvert à tous les curieux et à tous ceux qui souhaitent ouvrir leurs portes à un artiste.\r\nChaque lieu et chaque hôtes sont uniques, profitons-en et sortons des sentiers battus !\r\n', 2),
(4, 'Qui paie les frais de réception ?', 'C’est l’hôte… Toutefois, vous êtes libres de demander une participation à vos invités ! Le buffet qu’ils soit plutôt chips, bière et pizza ou verrines et vins raffinés c’est votre choix !\r\nEt si vous préférez être complètement disponible pour cette soirée, contacter nous à l’adresse lesexposalamaison@gmail.com, nous vous mettrons en relations avec nos partenaires.\r\n', 3);

-- --------------------------------------------------------

--
-- Structure de la table `landing`
--

CREATE TABLE `landing` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `landing`
--

INSERT INTO `landing` (`id`, `image`, `categorie`) VALUES
(1, 'img/landing/2048x800.png', 1),
(2, 'img/landing/2048x800.png', 1),
(3, 'img/landing/2048x800.png', 1),
(4, 'img/landing/2048x800.png', 1),
(5, 'img/landing/2048x800.png', 2),
(6, 'img/landing/2048x800.png', 2),
(7, 'img/landing/2048x800.png', 2),
(8, 'img/landing/2048x800.png', 2),
(9, 'img/landing/2048x800.png', 2);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `expositions` int(10) UNSIGNED DEFAULT NULL,
  `author` int(10) UNSIGNED DEFAULT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `expositions`, `author`, `texte`, `time`) VALUES
(1, 1, 1, 'Hello World!', 1494766119);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_user` smallint(6) DEFAULT NULL,
  `route` varchar(255) NOT NULL,
  `action` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `role`, `name`) VALUES
(1, 1, 'invite'),
(2, 2, 'hote'),
(3, 3, 'artiste'),
(4, 4, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) UNSIGNED DEFAULT NULL,
  `profilPicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `profilPicture`) VALUES
(1, 'emi', 'emi@e', '$2y$13$ZlbVSKAUJSkIxFy0c9BsTus56FEtkhe44AMc7PCM3u18/Z.ibCkUq', 4, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `charte`
--
ALTER TABLE `charte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expositions`
--
ALTER TABLE `expositions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interrogation`
--
ALTER TABLE `interrogation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `landing`
--
ALTER TABLE `landing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expositions` (`expositions`),
  ADD KEY `author` (`author`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user` (`role_user`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `charte`
--
ALTER TABLE `charte`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `expositions`
--
ALTER TABLE `expositions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `interrogation`
--
ALTER TABLE `interrogation`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `landing`
--
ALTER TABLE `landing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_DB021E969F0CBF28` FOREIGN KEY (`expositions`) REFERENCES `expositions` (`id`),
  ADD CONSTRAINT `FK_DB021E96BDAFD8C8` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`role_user`) REFERENCES `roles` (`role`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E957698A6A` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

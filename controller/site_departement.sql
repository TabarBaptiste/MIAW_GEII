-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 19 juin 2024 à 14:08
-- Version du serveur : 11.4.2-MariaDB
-- Version de PHP : 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site_departement`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(50) NOT NULL,
  `id_enseignant_principal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE `compose` (
  `id_classe` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `date` date NOT NULL,
  `mode_examen` tinyint(1) NOT NULL,
  `id_salle` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL,
  `id_utilisateur` varchar(255) DEFAULT NULL,
  `id_classe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dispose`
--

CREATE TABLE `dispose` (
  `id_role` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE `enseigne` (
  `id_matiere` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_utilisateur` varchar(255) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre_alternance`
--

CREATE TABLE `offre_alternance` (
  `id_offre` int(11) NOT NULL,
  `denomination_offre` varchar(130) NOT NULL,
  `addresse_offre` varchar(150) NOT NULL,
  `code_postal_offre` varchar(5) NOT NULL,
  `competences_offre` varchar(100) NOT NULL,
  `description_offre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet_tutore`
--

CREATE TABLE `projet_tutore` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(30) NOT NULL,
  `domaine_projet` varchar(30) NOT NULL,
  `competences_projet` varchar(100) NOT NULL,
  `description_projet` varchar(500) NOT NULL,
  `fichiers_projet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE `propose` (
  `id_utilisateur` varchar(255) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `acces_vue_etu` tinyint(1) NOT NULL,
  `acces_vue_ens` tinyint(1) NOT NULL,
  `acces_vue_ent` tinyint(1) NOT NULL,
  `modification_etu` tinyint(1) NOT NULL,
  `modification_ens` tinyint(1) NOT NULL,
  `modification_ent` tinyint(1) NOT NULL,
  `modification_proj` tinyint(1) NOT NULL,
  `creer_etu` tinyint(1) NOT NULL,
  `creer_ens` tinyint(1) NOT NULL,
  `creer_ent` tinyint(1) NOT NULL,
  `creer_proj` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `nom`, `acces_vue_etu`, `acces_vue_ens`, `acces_vue_ent`, `modification_etu`, `modification_ens`, `modification_ent`, `modification_proj`, `creer_etu`, `creer_ens`, `creer_ent`, `creer_proj`) VALUES
(1, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'etudiant', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'enseignant', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'entreprise', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `nom` varchar(130) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `siret` varchar(14) DEFAULT NULL,
  `numero_voie` int(8) DEFAULT NULL,
  `indice_voie` varchar(8) DEFAULT NULL,
  `type_voie` varchar(30) DEFAULT NULL,
  `libelle_voie` varchar(255) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `departement` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD UNIQUE KEY `classe_AK` (`id_enseignant_principal`);

--
-- Index pour la table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`id_classe`,`id_utilisateur`),
  ADD KEY `compose_utilisateurs0_FK` (`id_utilisateur`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `cours_salle_FK` (`id_salle`),
  ADD KEY `cours_matiere0_FK` (`id_matiere`),
  ADD KEY `cours_utilisateurs1_FK` (`id_utilisateur`),
  ADD KEY `cours_classe2_FK` (`id_classe`);

--
-- Index pour la table `dispose`
--
ALTER TABLE `dispose`
  ADD PRIMARY KEY (`id_role`,`id_utilisateur`),
  ADD KEY `dispose_utilisateurs0_FK` (`id_utilisateur`);

--
-- Index pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD PRIMARY KEY (`id_matiere`,`id_utilisateur`),
  ADD KEY `enseigne_utilisateurs0_FK` (`id_utilisateur`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_utilisateur`,`id_cours`),
  ADD KEY `note_cours0_FK` (`id_cours`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`,`id_utilisateur`),
  ADD KEY `offre_utilisateurs0_FK` (`id_utilisateur`);

--
-- Index pour la table `offre_alternance`
--
ALTER TABLE `offre_alternance`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `projet_tutore`
--
ALTER TABLE `projet_tutore`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `propose`
--
ALTER TABLE `propose`
  ADD PRIMARY KEY (`id_utilisateur`,`id_projet`),
  ADD KEY `propose_projet_tutore0_FK` (`id_projet`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `siret` (`siret`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre_alternance`
--
ALTER TABLE `offre_alternance`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet_tutore`
--
ALTER TABLE `projet_tutore`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `compose_classe_FK` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `compose_utilisateurs0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_classe2_FK` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `cours_matiere0_FK` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `cours_salle_FK` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`),
  ADD CONSTRAINT `cours_utilisateurs1_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `dispose`
--
ALTER TABLE `dispose`
  ADD CONSTRAINT `dispose_roles_FK` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `dispose_utilisateurs0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `enseigne_matiere_FK` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `enseigne_utilisateurs0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_cours0_FK` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `note_utilisateurs_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_offre_alternance_FK` FOREIGN KEY (`id_offre`) REFERENCES `offre_alternance` (`id_offre`),
  ADD CONSTRAINT `offre_utilisateurs0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `propose_projet_tutore0_FK` FOREIGN KEY (`id_projet`) REFERENCES `projet_tutore` (`id_projet`),
  ADD CONSTRAINT `propose_utilisateurs_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 18 avr. 2018 à 13:32
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `modal_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

CREATE TABLE `details` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `mail` varchar(50) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `details`
--

INSERT INTO `details` (`id`, `name`, `surname`, `summary`, `description`, `address`, `mail`, `linkedin`, `github`, `twitter`, `keywords`, `userid`) VALUES
(1, 'Antoine', 'Carossio', 'Engineering and Business Student', 'Selected into the dual degree between the École polytechnique and HEC Paris,\nthe two most prestigious higher education establishments in France,\nwith a passion for computer science and a strong curiosity about new technologies.', '9 Boulevard des Maréchaux, 91120 Palaiseau', 'antoine.carossio@me.com', 'https://www.linkedin.com/in/acarossio/', 'https://twitter.com/icarossio', 'https://github.com/iCarossio', 'Antoine, Carossio, HEC, Polytechnique, Computer Science, Finance', 'Antoine'),
(3, '', '', '', '', '', 'dominique@polytechnique.edu', '', '', '', '', 'dominique');

-- --------------------------------------------------------

--
-- Structure de la table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `education`
--

INSERT INTO `education` (`id`, `title`, `subtitle`, `institution`, `dates`, `description`, `url`, `userid`) VALUES
(1, 'Master of Sciences', 'Cycle ingénieur', 'École polytechnique', '2016-2020', '\'École polytechnique is the most prestigious educational establishment in France, combining top-level research, academics, and innovation at the cutting-edge of science and technology.\'\n\nEngineering studies, majoring in computer science. Courses taken include:\n• Object Oriented Programming with Java, Design and Analysis of Algorithms, Concurrent Computing, Advanced programming, Big Data with C  , Web development (complying with W3C Standards)\n• Advanced Probabilities and Statistics, Markov chains\n• Macroeconomics, Microeconomics\n• Cell biology, Molecular Biology', 'https://www.polytechnique.edu/fr/cycle-ingenieur', 'Antoine'),
(2, 'Master in Management', 'Grande École', 'HEC Paris', '2015-2020', '\'Specialized in education and research in management, HEC Paris is ranked first business school in France, delivering the world best Master in Finance (Financial Times, 2016).\'\n\nGeneral business studies within the European best Master in Management (Financial Times, 2017)\n• Financial Economics, Financial Markets, Corporate Finance, Financial Accounting\n• Business Strategy, Corporate Strategy, Agile Methodologies\n• Contract Law, Company Law, Labour Law\n• Supply Chain Management, Marketing', 'http://www.hec.fr/Grande-Ecole-MS-MSc/Programmes-diplomants/Grande-Ecole/Master-in-Management/Points-Cles', 'Antoine'),
(3, 'Business ', 'ECS preparatory school', 'Lycée Henri IV', '2013-2015', 'Intensive two-year preparation course for the competitive entrance examinations to French business schools (Grandes Écoles de Commerce), focusing on mathematics, geopolitics, philosophy, English and Spanish.', 'http://lyc-henri4.scola.ac-paris.fr', 'Antoine'),
(4, 'Bachelors in Applied Mathematics', 'Lience MIASHS', 'The Sorbonne', '2015-2016', 'Ranked first of the bachelors of mathematics and computer sciences applied to human and social sciences.\n• Differential Calculus, Optimization Theory, Hilbert Space\n• Measure Theory, Probabilities and Statistics', 'https://www.pantheonsorbonne.fr/ufr/ufr27/acces-l1/licence-miashs/', 'Antoine');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `subtitle`, `institution`, `dates`, `description`, `url`, `userid`) VALUES
(1, 'Software Engineer ', 'Open Source Collaborative Project', 'in collaboration with EY ', '2017-2018', 'Selected by the Ernst ', 'http://www.ey.com/fr/fr/newsroom/news-releases/communique-de-presse-ey-experience-lab', 'Antoine'),
(2, 'Chief Information Officer ', '', 'Binet Réseau', '2017-', 'The Binet Réseau is the computer science students’ association of the Ecole polytechnique.\n• In charge of organizing certain events at school inviting technological startups and companies\n• Development of the Binet\nRéseau’s website • Management of websites used by all\nstudents on the campus\n• Server administrator', 'https://br.binets.fr', 'Antoine'),
(3, 'Software Engineer ', 'Intern', 'Ministry of National Defense', '2017-2017', 'I took part in the development of 3 main projects using collaborative versioning tools (Git) in an agile environment :\n• Developed big data presentation tools, including graphs and statistics : front-end (web interface, AngularJS, Highcharts, D3.js) and back-end (Django, Python, MySQL)\n• Parsing and converting regular expressions from a proprietary format to PCRE : first-hand experience in C\n• Performed unit testing : Python, C', 'https://www.defense.gouv.fr', 'Antoine'),
(4, 'Military Training', 'Army Officer', 'École Spéciale Militaire de Saint-Cyr', '2016', 'Human sciences and military training at the École Spéciale Militaire de Saint-Cyr, the foremost French army officer academy. During two months, I both developed team spirit and leadership under pressure in highly challenging environment.', 'https://www.st-cyr.terre.defense.gouv.fr', 'Antoine'),
(5, 'Test', '', 'Bonjour', '', '', '', 'Antoine');

-- --------------------------------------------------------

--
-- Structure de la table `skills_com`
--

CREATE TABLE `skills_com` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `percentage` smallint(5) UNSIGNED NOT NULL,
  `details` varchar(40) NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills_com`
--

INSERT INTO `skills_com` (`id`, `title`, `percentage`, `details`, `userid`) VALUES
(1, 'French', 100, 'Mother Tongue', 'Antoine'),
(2, 'English', 80, 'Fluent', 'Antoine'),
(3, 'Spanish', 75, 'Proficient', 'Antoine');

-- --------------------------------------------------------

--
-- Structure de la table `skills_info`
--

CREATE TABLE `skills_info` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `percentage` smallint(5) UNSIGNED NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills_info`
--

INSERT INTO `skills_info` (`id`, `title`, `details`, `percentage`, `userid`) VALUES
(1, 'Systems', 'macOS, Linux, Windows, iOS, Android', 95, 'Antoine'),
(2, 'Languages', 'Flask, Django, AngularJS, jQuery, Bootstrap', 75, 'Antoine'),
(3, 'Softwares', 'HTML, CSS, JavaScript, SQL, Python, PHP, C', 90, 'Antoine'),
(4, 'Libraries', 'Word, Excel, Powerpoint, Photoshop, Git', 75, 'Antoine');

-- --------------------------------------------------------

--
-- Structure de la table `skills_pro`
--

CREATE TABLE `skills_pro` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(80) NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills_pro`
--

INSERT INTO `skills_pro` (`id`, `title`, `userid`) VALUES
(1, 'Leadership', 'Antoine'),
(2, 'Management', 'Antoine'),
(3, 'Branding', 'Antoine'),
(4, 'Marketing', 'Antoine'),
(5, 'Accountability', 'Antoine'),
(6, 'Finance', 'Antoine'),
(7, 'Creativity', 'Antoine'),
(8, 'Motivation', 'Antoine'),
(9, 'Strategy', 'Antoine');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `login` varchar(30) NOT NULL,
  `mdp` char(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`login`, `mdp`) VALUES
('Antoine', '1f122ae8d5808d5ed8a8b0ca329e05d8ca098b07'),
('dominique', '1f122ae8d5808d5ed8a8b0ca329e05d8ca098b07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Index pour la table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`);

--
-- Index pour la table `skills_com`
--
ALTER TABLE `skills_com`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Index pour la table `skills_info`
--
ALTER TABLE `skills_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Index pour la table `skills_pro`
--
ALTER TABLE `skills_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `details`
--
ALTER TABLE `details`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `skills_com`
--
ALTER TABLE `skills_com`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `skills_info`
--
ALTER TABLE `skills_info`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `skills_pro`
--
ALTER TABLE `skills_pro`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `UsersCoherence` FOREIGN KEY (`userid`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `skills_com`
--
ALTER TABLE `skills_com`
  ADD CONSTRAINT `skills_com_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `skills_info`
--
ALTER TABLE `skills_info`
  ADD CONSTRAINT `skills_info_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `skills_pro`
--
ALTER TABLE `skills_pro`
  ADD CONSTRAINT `skills_pro_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

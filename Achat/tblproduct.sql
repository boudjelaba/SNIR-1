CREATE TABLE `produits` (
  `id_prod` int(8) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `prix` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `produits` (`id_prod`, `nom`, `ref`, `image`, `prix`) VALUES
(1, 'Ordinateur Lenovo', 'LV001', 'images/Ordi1.jpg', 490.00),
(2, 'Ordinateur DELL', 'DL002', 'images/Ordi2.jpg', 450.90),
(3, 'Ordinateur Asus', 'AS003', 'images/Ordi3.jpg', 399.90),
(4, 'Ordinateur HP', 'HP004', 'images/Ordi4.jpg', 349.00);

--
-- Index pour table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_prod`),
  ADD UNIQUE KEY `red` (`ref`);

--
-- AUTO_INCREMENT pour table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_prod` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
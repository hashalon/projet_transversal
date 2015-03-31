SET FOREIGN_KEY_CHECKS=0;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD CONSTRAINT `arrondissement_ibfk_1` FOREIGN KEY (`dep_no`) REFERENCES `departement` (`dep_no`);

--
-- Contraintes pour la table `chomage`
--
ALTER TABLE `chomage`
  ADD CONSTRAINT `chomage_ibfk_1` FOREIGN KEY (`zone_no`) REFERENCES `zone_demploi` (`zone_no`);

--
-- Contraintes pour la table `commune`
--

ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`zone_no`) REFERENCES `zone_demploi` (`zone_no`),
  ADD CONSTRAINT `commune_ibfk_2` FOREIGN KEY (`arr_code`) REFERENCES `arrondissement` (`arr_code`);

--
-- Contraintes pour la table `deces`
--
ALTER TABLE `deces`
  ADD CONSTRAINT `deces_ibfk_1` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `defm`
--
ALTER TABLE `defm`
  ADD CONSTRAINT `defm_ibfk_1` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);
  
--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `region` (`reg_no`);

--
-- Contraintes pour la table `etabl_activ`
--
ALTER TABLE `etabl_activ`
  ADD CONSTRAINT `etabl_activ_ibfk_1` FOREIGN KEY (`etabl_id`) REFERENCES `etablissement` (`etabl_id`),
  ADD CONSTRAINT `etabl_activ_ibfk_2` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_ibfk_1` FOREIGN KEY (`log_type_id`) REFERENCES `log_type` (`log_type_id`),
  ADD CONSTRAINT `logements_ibfk_2` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `menages`
--
ALTER TABLE `menages`
  ADD CONSTRAINT `menages_ibfk_1` FOREIGN KEY (`mt_id`) REFERENCES `menage_type` (`mt_id`),
  ADD CONSTRAINT `menages_ibfk_2` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `naissance`
--
ALTER TABLE `naissance`
  ADD CONSTRAINT `naissance_ibfk_1` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `population`
--
ALTER TABLE `population`
  ADD CONSTRAINT `population_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categorie_age` (`cat_id`),
  ADD CONSTRAINT `population_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `pop_type` (`pt_id`),
  ADD CONSTRAINT `population_ibfk_3` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `revenue_fisc`
--
ALTER TABLE `revenue_fisc`
  ADD CONSTRAINT `revenue_fisc_ibfk_1` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `travailleurs`
--
ALTER TABLE `travailleurs`
  ADD CONSTRAINT `travailleurs_ibfk_1` FOREIGN KEY (`zone_no`) REFERENCES `zone_demploi` (`zone_no`),
  ADD CONSTRAINT `travailleurs_ibfk_2` FOREIGN KEY (`com_code`) REFERENCES `commune` (`com_code`),
  ADD CONSTRAINT `travailleurs_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `categorie_age` (`cat_id`);
  
  SET FOREIGN_KEY_CHECKS=1;
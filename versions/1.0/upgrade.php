<?php
/**
 * Script non interactif d'installation du module cron
 */

// deja appele par l'installer
// $db->beginTransaction();

$sql = <<<SQL

-- -----------------------------------------------------
-- Table `clementine_cron`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clementine_cron` (
  `id` int(11) DEFAULT NULL AUTO_INCREMENT,
  `lang` varchar(4) NOT NULL,
  `action` varchar(64) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_stop` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

SQL;

if (!$db->prepare($sql)->execute()) {
    $db->rollBack();
    return false;
}

// deja appele par l'installer
// $db->commit();

return true;
?>

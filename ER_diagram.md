-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema softcode
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema softcode
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `softcode` DEFAULT CHARACTER SET utf8 ;
USE `softcode` ;

-- -----------------------------------------------------
-- Table `softcode`.`gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`gender` (
  `gender_id` INT NOT NULL AUTO_INCREMENT,
  `gender_name` VARCHAR(45) NULL,
  PRIMARY KEY (`gender_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`work_location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`work_location` (
  `work_location_id` INT NOT NULL AUTO_INCREMENT,
  `work_location` VARCHAR(45) NULL,
  PRIMARY KEY (`work_location_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`employment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`employment` (
  `employment_id` INT NOT NULL AUTO_INCREMENT,
  `employment_name` VARCHAR(45) NULL,
  PRIMARY KEY (`employment_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`department` (
  `department_id` INT NOT NULL AUTO_INCREMENT,
  `department_name` VARCHAR(45) NULL,
  PRIMARY KEY (`department_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`role` (
  `role_id` INT NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(45) NULL,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`e_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`e_status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`employees` (
  `employee_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `middle_name` VARCHAR(45) NULL,
  `pro_pic` VARCHAR(500) NULL,
  `date_of_birth` DATE NULL,
  `nic` VARCHAR(45) NULL,
  `personal_email` VARCHAR(45) NULL,
  `mobile_number` VARCHAR(45) NULL,
  `whatsapp_number` VARCHAR(45) NULL,
  `current_addres` VARCHAR(45) NULL,
  `permanent_addres` VARCHAR(45) NULL,
  `designation` VARCHAR(45) NULL,
  `date_of_joining` DATE NULL,
  `probation` DATE NULL,
  `salary_rate` VARCHAR(45) NULL,
  `branch` VARCHAR(45) NULL,
  `tax_id` VARCHAR(45) NULL,
  `allowances` VARCHAR(45) NULL,
  `company_email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `skills` VARCHAR(45) NULL,
  `experience` VARCHAR(45) NULL,
  `notes` VARCHAR(45) NULL,
  `cv` VARCHAR(500) NULL,
  `offer_latter` VARCHAR(500) NULL,
  `nic_front` VARCHAR(500) NULL,
  `nic_back` VARCHAR(500) NULL,
  `certificates` VARCHAR(500) NULL,
  `gender_gender_id` INT NOT NULL,
  `work_location_work_location_id` INT NOT NULL,
  `employment_employment_id` INT NOT NULL,
  `department_department_id` INT NOT NULL,
  `role_role_id` INT NOT NULL,
  `e_status_status_id` INT NOT NULL,
  PRIMARY KEY (`employee_id`),
  INDEX `fk_employees_gender_idx` (`gender_gender_id` ASC) VISIBLE,
  INDEX `fk_employees_work_location1_idx` (`work_location_work_location_id` ASC) VISIBLE,
  INDEX `fk_employees_employment1_idx` (`employment_employment_id` ASC) VISIBLE,
  INDEX `fk_employees_department1_idx` (`department_department_id` ASC) VISIBLE,
  INDEX `fk_employees_role1_idx` (`role_role_id` ASC) VISIBLE,
  INDEX `fk_employees_e_status1_idx` (`e_status_status_id` ASC) VISIBLE,
  CONSTRAINT `fk_employees_gender`
    FOREIGN KEY (`gender_gender_id`)
    REFERENCES `softcode`.`gender` (`gender_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_work_location1`
    FOREIGN KEY (`work_location_work_location_id`)
    REFERENCES `softcode`.`work_location` (`work_location_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_employment1`
    FOREIGN KEY (`employment_employment_id`)
    REFERENCES `softcode`.`employment` (`employment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_department1`
    FOREIGN KEY (`department_department_id`)
    REFERENCES `softcode`.`department` (`department_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_role1`
    FOREIGN KEY (`role_role_id`)
    REFERENCES `softcode`.`role` (`role_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_e_status1`
    FOREIGN KEY (`e_status_status_id`)
    REFERENCES `softcode`.`e_status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`a_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`a_status` (
  `status_id` INT ZEROFILL NOT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`attendance` (
  `attendance_id` INT NOT NULL AUTO_INCREMENT,
  `date` VARCHAR(45) NULL,
  `hours` VARCHAR(45) NULL,
  `notes` VARCHAR(45) NULL,
  `employees_employee_id` INT NOT NULL,
  `a_status_status_id` INT ZEROFILL NOT NULL,
  PRIMARY KEY (`attendance_id`),
  INDEX `fk_attendance_employees1_idx` (`employees_employee_id` ASC) VISIBLE,
  INDEX `fk_attendance_a_status1_idx` (`a_status_status_id` ASC) VISIBLE,
  CONSTRAINT `fk_attendance_employees1`
    FOREIGN KEY (`employees_employee_id`)
    REFERENCES `softcode`.`employees` (`employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_attendance_a_status1`
    FOREIGN KEY (`a_status_status_id`)
    REFERENCES `softcode`.`a_status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`performance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`performance` (
  `performance_id` INT NOT NULL AUTO_INCREMENT,
  `kpi` VARCHAR(45) NULL,
  `rating` INT NULL,
  `employees_employee_id` INT NOT NULL,
  PRIMARY KEY (`performance_id`),
  INDEX `fk_performance_employees1_idx` (`employees_employee_id` ASC) VISIBLE,
  CONSTRAINT `fk_performance_employees1`
    FOREIGN KEY (`employees_employee_id`)
    REFERENCES `softcode`.`employees` (`employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`preferred_communication`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`preferred_communication` (
  `pre_id` INT NOT NULL AUTO_INCREMENT,
  `preferred_communication` VARCHAR(45) NULL,
  PRIMARY KEY (`pre_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`billing_terms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`billing_terms` (
  `billing_terms_id` INT NOT NULL AUTO_INCREMENT,
  `billing_terms` VARCHAR(45) NULL,
  PRIMARY KEY (`billing_terms_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`currency`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`currency` (
  `currency_id` INT NOT NULL AUTO_INCREMENT,
  `currency` VARCHAR(45) NULL,
  PRIMARY KEY (`currency_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`payment_method`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`payment_method` (
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `payment_method` VARCHAR(45) NULL,
  PRIMARY KEY (`payment_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`priority_level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`priority_level` (
  `priority_level_id` INT NOT NULL AUTO_INCREMENT,
  `priority_level` VARCHAR(45) NULL,
  PRIMARY KEY (`priority_level_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`c_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`c_status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`country` (
  `country_id` INT NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(45) NULL,
  PRIMARY KEY (`country_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`clients` (
  `client_id` INT NOT NULL AUTO_INCREMENT,
  `client_name` VARCHAR(100) NULL,
  `company_name` VARCHAR(100) NOT NULL,
  `email_addres` VARCHAR(45) NULL,
  `phone_number` VARCHAR(10) NULL,
  `whatsapp_namber` VARCHAR(10) NULL,
  `billing_address` VARCHAR(100) NULL,
  `office_addres` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NULL,
  `postal_code` VARCHAR(45) NULL,
  `industry` VARCHAR(100) NULL,
  `assigned_account_manager` VARCHAR(45) NULL,
  `associated_project` VARCHAR(45) NULL,
  `tax_number` VARCHAR(45) NULL,
  `request_documentation` VARCHAR(500) NOT NULL,
  `agreement_doc` VARCHAR(500) NULL,
  `ndas_doc` VARCHAR(500) NULL,
  `special_request` VARCHAR(45) NOT NULL,
  `preferred_communication_pre_id` INT NOT NULL,
  `billing_terms_billing_terms_id` INT NOT NULL,
  `currency_currency_id` INT NOT NULL,
  `payment_method_payment_method` INT NOT NULL,
  `priority_level_priority_level_id` INT NOT NULL,
  `c_status_status_id` INT NOT NULL,
  `project_count` INT NULL,
  `country_country_id` INT NOT NULL,
  PRIMARY KEY (`client_id`),
  INDEX `fk_clients_preferred_communication1_idx` (`preferred_communication_pre_id` ASC) VISIBLE,
  INDEX `fk_clients_billing_terms1_idx` (`billing_terms_billing_terms_id` ASC) VISIBLE,
  INDEX `fk_clients_currency1_idx` (`currency_currency_id` ASC) VISIBLE,
  INDEX `fk_clients_payment_method1_idx` (`payment_method_payment_method` ASC) VISIBLE,
  INDEX `fk_clients_priority_level1_idx` (`priority_level_priority_level_id` ASC) VISIBLE,
  INDEX `fk_clients_c_status1_idx` (`c_status_status_id` ASC) VISIBLE,
  INDEX `fk_clients_country1_idx` (`country_country_id` ASC) VISIBLE,
  CONSTRAINT `fk_clients_preferred_communication1`
    FOREIGN KEY (`preferred_communication_pre_id`)
    REFERENCES `softcode`.`preferred_communication` (`pre_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_billing_terms1`
    FOREIGN KEY (`billing_terms_billing_terms_id`)
    REFERENCES `softcode`.`billing_terms` (`billing_terms_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_currency1`
    FOREIGN KEY (`currency_currency_id`)
    REFERENCES `softcode`.`currency` (`currency_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_payment_method1`
    FOREIGN KEY (`payment_method_payment_method`)
    REFERENCES `softcode`.`payment_method` (`payment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_priority_level1`
    FOREIGN KEY (`priority_level_priority_level_id`)
    REFERENCES `softcode`.`priority_level` (`priority_level_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_c_status1`
    FOREIGN KEY (`c_status_status_id`)
    REFERENCES `softcode`.`c_status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_country1`
    FOREIGN KEY (`country_country_id`)
    REFERENCES `softcode`.`country` (`country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`project_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`project_type` (
  `project_type_id` INT NOT NULL AUTO_INCREMENT,
  `project_type` VARCHAR(45) NULL,
  PRIMARY KEY (`project_type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`project_phase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`project_phase` (
  `phase_id` INT NOT NULL AUTO_INCREMENT,
  `phase_name` VARCHAR(45) NULL,
  PRIMARY KEY (`phase_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`payment_terms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`payment_terms` (
  `terms_id` INT NOT NULL AUTO_INCREMENT,
  `terms_name` VARCHAR(45) NULL,
  PRIMARY KEY (`terms_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`current_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`current_status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`rating` (
  `rating_id` INT NOT NULL AUTO_INCREMENT,
  `rating` VARCHAR(45) NULL,
  PRIMARY KEY (`rating_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`sla_tracking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`sla_tracking` (
  `sla_id` INT NOT NULL AUTO_INCREMENT,
  `sla` VARCHAR(45) NULL,
  PRIMARY KEY (`sla_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`priority`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`priority` (
  `priority_id` INT NOT NULL AUTO_INCREMENT,
  `priority` VARCHAR(45) NULL,
  PRIMARY KEY (`priority_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`projects` (
  `projects_id` INT NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(45) NULL,
  `project_description` VARCHAR(1500) NULL,
  `start_date` DATE NULL,
  `expected_end_date` DATE NULL,
  `actual_date` DATE NULL,
  `project_budget` VARCHAR(45) NULL,
  `invoices_link` VARCHAR(45) NULL,
  `expenses` VARCHAR(45) NULL,
  `key_deliverables` VARCHAR(500) NULL,
  `file_link` VARCHAR(1500) NULL,
  `project_tags` VARCHAR(45) NULL,
  `risks` VARCHAR(500) NULL,
  `client_note` VARCHAR(500) NULL,
  `internal_note` VARCHAR(500) NULL,
  `meeting_record` VARCHAR(200) NULL,
  `tickets` VARCHAR(45) NULL,
  `rating` VARCHAR(45) NULL,
  `progress` VARCHAR(45) NULL,
  `project_type_project_type_id` INT NOT NULL,
  `project_phase_phase_id` INT NOT NULL,
  `payment_terms_terms_id` INT NOT NULL,
  `current_status_status_id` INT NOT NULL,
  `rating_rating` INT NOT NULL,
  `sla_tracking_sla_id` INT NOT NULL,
  `priority_priority_id` INT NOT NULL,
  PRIMARY KEY (`projects_id`),
  INDEX `fk_projects_project_type1_idx` (`project_type_project_type_id` ASC) VISIBLE,
  INDEX `fk_projects_project_phase1_idx` (`project_phase_phase_id` ASC) VISIBLE,
  INDEX `fk_projects_payment_terms1_idx` (`payment_terms_terms_id` ASC) VISIBLE,
  INDEX `fk_projects_current_status1_idx` (`current_status_status_id` ASC) VISIBLE,
  INDEX `fk_projects_rating1_idx` (`rating_rating` ASC) VISIBLE,
  INDEX `fk_projects_sla_tracking1_idx` (`sla_tracking_sla_id` ASC) VISIBLE,
  INDEX `fk_projects_priority1_idx` (`priority_priority_id` ASC) VISIBLE,
  CONSTRAINT `fk_projects_project_type1`
    FOREIGN KEY (`project_type_project_type_id`)
    REFERENCES `softcode`.`project_type` (`project_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_project_phase1`
    FOREIGN KEY (`project_phase_phase_id`)
    REFERENCES `softcode`.`project_phase` (`phase_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_payment_terms1`
    FOREIGN KEY (`payment_terms_terms_id`)
    REFERENCES `softcode`.`payment_terms` (`terms_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_current_status1`
    FOREIGN KEY (`current_status_status_id`)
    REFERENCES `softcode`.`current_status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_rating1`
    FOREIGN KEY (`rating_rating`)
    REFERENCES `softcode`.`rating` (`rating_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_sla_tracking1`
    FOREIGN KEY (`sla_tracking_sla_id`)
    REFERENCES `softcode`.`sla_tracking` (`sla_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_priority1`
    FOREIGN KEY (`priority_priority_id`)
    REFERENCES `softcode`.`priority` (`priority_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`bank`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`bank` (
  `bank_id` INT NOT NULL AUTO_INCREMENT,
  `bank_name` VARCHAR(45) NULL,
  PRIMARY KEY (`bank_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`online_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`online_payment` (
  `pyament_id` INT NOT NULL AUTO_INCREMENT,
  `amount` VARCHAR(45) NULL,
  `bank_bank_id` INT NOT NULL,
  PRIMARY KEY (`pyament_id`),
  INDEX `fk_online_payment_bank1_idx` (`bank_bank_id` ASC) VISIBLE,
  CONSTRAINT `fk_online_payment_bank1`
    FOREIGN KEY (`bank_bank_id`)
    REFERENCES `softcode`.`bank` (`bank_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`method`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`method` (
  `method_id` INT NOT NULL AUTO_INCREMENT,
  `method` VARCHAR(45) NULL,
  PRIMARY KEY (`method_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`offline_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`offline_payment` (
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `amount` VARCHAR(45) NULL,
  `slip` VARCHAR(500) NULL,
  `reference_no` VARCHAR(45) NULL,
  `method_method_id` INT NOT NULL,
  PRIMARY KEY (`payment_id`),
  INDEX `fk_offline_payment_method1_idx` (`method_method_id` ASC) VISIBLE,
  CONSTRAINT `fk_offline_payment_method1`
    FOREIGN KEY (`method_method_id`)
    REFERENCES `softcode`.`method` (`method_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`c_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`c_payment` (
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `online_payment_pyament_id` INT NOT NULL,
  `offline_payment_payment_id` INT NOT NULL,
  `projects_projects_id` INT NOT NULL,
  `clients_client_id` INT NOT NULL,
  PRIMARY KEY (`payment_id`),
  INDEX `fk_c_payment_online_payment1_idx` (`online_payment_pyament_id` ASC) VISIBLE,
  INDEX `fk_c_payment_offline_payment1_idx` (`offline_payment_payment_id` ASC) VISIBLE,
  INDEX `fk_c_payment_projects1_idx` (`projects_projects_id` ASC) VISIBLE,
  INDEX `fk_c_payment_clients1_idx` (`clients_client_id` ASC) VISIBLE,
  CONSTRAINT `fk_c_payment_online_payment1`
    FOREIGN KEY (`online_payment_pyament_id`)
    REFERENCES `softcode`.`online_payment` (`pyament_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_c_payment_offline_payment1`
    FOREIGN KEY (`offline_payment_payment_id`)
    REFERENCES `softcode`.`offline_payment` (`payment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_c_payment_projects1`
    FOREIGN KEY (`projects_projects_id`)
    REFERENCES `softcode`.`projects` (`projects_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_c_payment_clients1`
    FOREIGN KEY (`clients_client_id`)
    REFERENCES `softcode`.`clients` (`client_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`reuest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`reuest` (
  `reuest_id` INT NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(45) NULL,
  `project_description` VARCHAR(1500) NULL,
  `budget_min` VARCHAR(45) NULL,
  `budget_max` VARCHAR(45) NULL,
  `doc` VARCHAR(500) NULL,
  `notes` VARCHAR(1500) NULL,
  `project_type_project_type_id` INT NOT NULL,
  `priority_priority_id` INT NOT NULL,
  PRIMARY KEY (`reuest_id`),
  INDEX `fk_reuest_project_type1_idx` (`project_type_project_type_id` ASC) VISIBLE,
  INDEX `fk_reuest_priority1_idx` (`priority_priority_id` ASC) VISIBLE,
  CONSTRAINT `fk_reuest_project_type1`
    FOREIGN KEY (`project_type_project_type_id`)
    REFERENCES `softcode`.`project_type` (`project_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reuest_priority1`
    FOREIGN KEY (`priority_priority_id`)
    REFERENCES `softcode`.`priority` (`priority_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`documents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`documents` (
  `ducument_id` INT NOT NULL AUTO_INCREMENT,
  `document name` VARCHAR(45) NULL,
  `document_link` VARCHAR(500) NULL,
  `vertion` VARCHAR(45) NULL,
  PRIMARY KEY (`ducument_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softcode`.`uplord_document`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softcode`.`uplord_document` (
  `document_id` INT NOT NULL AUTO_INCREMENT,
  `document name` VARCHAR(45) NULL,
  `document link` VARCHAR(5000) NULL,
  PRIMARY KEY (`document_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- MySQL Workbench Synchronization
-- Generated: 2025-09-11 11:09
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_department1`,
DROP FOREIGN KEY `fk_employees_e_status1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_a_status1`;

ALTER TABLE `softcode`.`performance` 
DROP FOREIGN KEY `fk_performance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_current_status1`,
DROP FOREIGN KEY `fk_projects_rating1`,
DROP FOREIGN KEY `fk_projects_sla_tracking1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_offline_payment1`,
DROP FOREIGN KEY `fk_c_payment_projects1`;

ALTER TABLE `softcode`.`online_payment` 
DROP FOREIGN KEY `fk_online_payment_bank1`;

ALTER TABLE `softcode`.`offline_payment` 
DROP FOREIGN KEY `fk_offline_payment_method1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD COLUMN `joing_date` DATE NULL DEFAULT NULL AFTER `project_count`,
CHANGE COLUMN `project_count` `project_count` INT(11) NULL DEFAULT NULL AFTER `special_request`;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`,
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`attendance` ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`,
DROP FOREIGN KEY `fk_clients_c_status1`,
DROP FOREIGN KEY `fk_clients_country1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`,
DROP FOREIGN KEY `fk_c_payment_clients1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- MySQL Workbench Synchronization
-- Generated: 2025-09-11 13:15
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_department1`,
DROP FOREIGN KEY `fk_employees_e_status1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_a_status1`;

ALTER TABLE `softcode`.`performance` 
DROP FOREIGN KEY `fk_performance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_current_status1`,
DROP FOREIGN KEY `fk_projects_rating1`,
DROP FOREIGN KEY `fk_projects_sla_tracking1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_offline_payment1`,
DROP FOREIGN KEY `fk_c_payment_projects1`;

ALTER TABLE `softcode`.`online_payment` 
DROP FOREIGN KEY `fk_online_payment_bank1`;

ALTER TABLE `softcode`.`offline_payment` 
DROP FOREIGN KEY `fk_offline_payment_method1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD COLUMN `request_massage` VARCHAR(1500) NULL DEFAULT NULL AFTER `country_country_id`,
CHANGE COLUMN `joing_date` `joing_date` DATE NULL DEFAULT NULL AFTER `project_count`,
CHANGE COLUMN `client_name` `client_name` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `company_name` `company_name` VARCHAR(100) NOT NULL ,
CHANGE COLUMN `email_addres` `email_addres` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `phone_number` `phone_number` VARCHAR(10) NULL DEFAULT NULL ,
CHANGE COLUMN `whatsapp_namber` `whatsapp_namber` VARCHAR(10) NULL DEFAULT NULL ,
CHANGE COLUMN `billing_address` `billing_address` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `office_addres` `office_addres` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `city` `city` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `postal_code` `postal_code` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `industry` `industry` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `associated_project` `associated_project` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `request_documentation` `request_documentation` VARCHAR(500) NOT NULL ,
CHANGE COLUMN `special_request` `special_request` VARCHAR(45) NOT NULL ;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD COLUMN `clients_client_id` INT(11) NOT NULL AFTER `priority_priority_id`,
ADD INDEX `fk_projects_clients1_idx` (`clients_client_id` ASC) VISIBLE;
;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`,
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`attendance` ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`,
DROP FOREIGN KEY `fk_clients_c_status1`,
DROP FOREIGN KEY `fk_clients_country1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`,
DROP FOREIGN KEY `fk_c_payment_clients1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- MySQL Workbench Synchronization
-- Generated: 2025-09-11 13:36
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_department1`,
DROP FOREIGN KEY `fk_employees_e_status1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_a_status1`;

ALTER TABLE `softcode`.`performance` 
DROP FOREIGN KEY `fk_performance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_current_status1`,
DROP FOREIGN KEY `fk_projects_rating1`,
DROP FOREIGN KEY `fk_projects_sla_tracking1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_offline_payment1`,
DROP FOREIGN KEY `fk_c_payment_projects1`;

ALTER TABLE `softcode`.`online_payment` 
DROP FOREIGN KEY `fk_online_payment_bank1`;

ALTER TABLE `softcode`.`offline_payment` 
DROP FOREIGN KEY `fk_offline_payment_method1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
DROP COLUMN `password`,
CHANGE COLUMN `office_addres` `office_addres` VARCHAR(45) NOT NULL ;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
DROP COLUMN `notes`,
DROP COLUMN `project_description`,
DROP COLUMN `project_name`,
ADD COLUMN `clients_client_id` INT(11) NOT NULL AFTER `priority_priority_id`,
ADD COLUMN `r_status_status_id` INT(11) NOT NULL AFTER `clients_client_id`,
ADD INDEX `fk_reuest_clients1_idx` (`clients_client_id` ASC) VISIBLE,
ADD INDEX `fk_reuest_r_status1_idx` (`r_status_status_id` ASC) VISIBLE;
;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `softcode`.`r_status` (
  `status_id` INT(11) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`,
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`attendance` ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`,
DROP FOREIGN KEY `fk_clients_c_status1`,
DROP FOREIGN KEY `fk_clients_country1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`,
DROP FOREIGN KEY `fk_projects_clients1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`,
DROP FOREIGN KEY `fk_c_payment_clients1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_r_status1`
  FOREIGN KEY (`r_status_status_id`)
  REFERENCES `softcode`.`r_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- MySQL Workbench Synchronization
-- Generated: 2025-09-17 10:24
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_c_status1`,
DROP FOREIGN KEY `fk_clients_country1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_clients1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_clients_NIC1_idx` (`NIC_nic_number` ASC) VISIBLE,
DROP INDEX `fk_clients_NIC1_idx` ;
;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `doc` `doc` VARCHAR(1500) NULL DEFAULT NULL ,
CHANGE COLUMN `request_date` `request_date` DATE NULL DEFAULT NULL ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`r_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `softcode`.`NIC` (
  `nic_number` VARCHAR(15) NOT NULL,
  `fornt_url` VARCHAR(100) NULL DEFAULT NULL,
  `back_url` VARCHAR(100) NULL DEFAULT NULL,
  `gender_gender_id` INT(11) NOT NULL,
  PRIMARY KEY (`nic_number`),
  INDEX `fk_NIC_gender1_idx` (`gender_gender_id` ASC) VISIBLE,
  CONSTRAINT `fk_NIC_gender1`
    FOREIGN KEY (`gender_gender_id`)
    REFERENCES `softcode`.`gender` (`gender_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_NIC1`
  FOREIGN KEY (`NIC_nic_number`)
  REFERENCES `softcode`.`NIC` (`nic_number`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_clients1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_r_status1`
  FOREIGN KEY (`r_status_status_id`)
  REFERENCES `softcode`.`r_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- MySQL Workbench Synchronization
-- Generated: 2025-09-19 09:44
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_clients1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `role_name` `role_name` VARCHAR(100) NULL DEFAULT NULL ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`r_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`NIC` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`n_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_NIC1`
  FOREIGN KEY (`NIC_nic_number`)
  REFERENCES `softcode`.`NIC` (`nic_number`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_clients1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_r_status1`
  FOREIGN KEY (`r_status_status_id`)
  REFERENCES `softcode`.`r_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`NIC` 
ADD CONSTRAINT `fk_NIC_gender1`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_NIC_n_status1`
  FOREIGN KEY (`n_status_status_id`)
  REFERENCES `softcode`.`n_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- MySQL Workbench Synchronization
-- Generated: 2025-09-23 17:52
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `softcode`.`projects` 
ADD COLUMN `currency_currency_id` INT(11) NOT NULL AFTER `clients_client_id`,
ADD COLUMN `p_status_p_id` INT(11) NOT NULL AFTER `currency_currency_id`,
CHANGE COLUMN `client_note` `client_note` VARCHAR(500) NULL DEFAULT NULL ,
CHANGE COLUMN `internal_note` `internal_note` VARCHAR(500) NULL DEFAULT NULL ,
ADD INDEX `fk_projects_currency1_idx` (`currency_currency_id` ASC) VISIBLE,
ADD INDEX `fk_projects_p_status1_idx` (`p_status_p_id` ASC) VISIBLE;
;

ALTER TABLE `softcode`.`projects` 
ADD CONSTRAINT `fk_projects_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_p_status1`
  FOREIGN KEY (`p_status_p_id`)
  REFERENCES `mydb`.`p_status` (`p_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


<!-- invoice -->

-- MySQL Workbench Synchronization
-- Generated: 2025-09-23 22:03
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_department1`,
DROP FOREIGN KEY `fk_employees_e_status1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_a_status1`;

ALTER TABLE `softcode`.`performance` 
DROP FOREIGN KEY `fk_performance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_c_status1`,
DROP FOREIGN KEY `fk_clients_country1`,
DROP FOREIGN KEY `fk_clients_NIC1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_current_status1`,
DROP FOREIGN KEY `fk_projects_rating1`,
DROP FOREIGN KEY `fk_projects_sla_tracking1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_offline_payment1`,
DROP FOREIGN KEY `fk_c_payment_projects1`;

ALTER TABLE `softcode`.`online_payment` 
DROP FOREIGN KEY `fk_online_payment_bank1`;

ALTER TABLE `softcode`.`offline_payment` 
DROP FOREIGN KEY `fk_offline_payment_method1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_clients1`,
DROP FOREIGN KEY `fk_reuest_r_status1`;

ALTER TABLE `softcode`.`NIC` 
DROP FOREIGN KEY `fk_NIC_gender1`,
DROP FOREIGN KEY `fk_NIC_n_status1`;

ALTER TABLE `softcode`.`project_manager` 
DROP FOREIGN KEY `fk_project_manager_projects1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD COLUMN `invoice_in_id` INT(11) NOT NULL AFTER `clients_client_id`,
ADD INDEX `fk_c_payment_invoice1_idx` (`invoice_in_id` ASC) VISIBLE;
;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`r_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`NIC` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`n_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_manager` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`p_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `softcode`.`company_info` (
  `com_id` INT(11) NOT NULL AUTO_INCREMENT,
  `com_name` VARCHAR(45) NULL DEFAULT NULL,
  `com_addres` VARCHAR(45) NULL DEFAULT NULL,
  `com_mobile` VARCHAR(45) NULL DEFAULT NULL,
  `com_whatsapp` VARCHAR(45) NULL DEFAULT NULL,
  `com_email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`com_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `softcode`.`invoice` (
  `in_id` INT(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` VARCHAR(45) NOT NULL,
  `invoice_date` VARCHAR(45) NULL DEFAULT NULL,
  `due_date` VARCHAR(45) NULL DEFAULT NULL,
  `payment_terms` VARCHAR(45) NULL DEFAULT NULL,
  `subtotal` VARCHAR(45) NULL DEFAULT NULL,
  `tax_ammount` VARCHAR(45) NULL DEFAULT NULL,
  `discount_amount` VARCHAR(45) NULL DEFAULT NULL,
  `total_amount` VARCHAR(45) NULL DEFAULT NULL,
  `company_info_com_id` INT(11) NOT NULL,
  `clients_client_id` INT(11) NOT NULL,
  `projects_projects_id` INT(11) NOT NULL,
  `employees_employee_id` INT(11) NOT NULL,
  PRIMARY KEY (`in_id`),
  INDEX `fk_invoice_company_info1_idx` (`company_info_com_id` ASC) VISIBLE,
  INDEX `fk_invoice_clients1_idx` (`clients_client_id` ASC) VISIBLE,
  INDEX `fk_invoice_projects1_idx` (`projects_projects_id` ASC) VISIBLE,
  INDEX `fk_invoice_employees1_idx` (`employees_employee_id` ASC) VISIBLE,
  CONSTRAINT `fk_invoice_company_info1`
    FOREIGN KEY (`company_info_com_id`)
    REFERENCES `softcode`.`company_info` (`com_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_clients1`
    FOREIGN KEY (`clients_client_id`)
    REFERENCES `softcode`.`clients` (`client_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_projects1`
    FOREIGN KEY (`projects_projects_id`)
    REFERENCES `softcode`.`projects` (`projects_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_employees1`
    FOREIGN KEY (`employees_employee_id`)
    REFERENCES `softcode`.`employees` (`employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `softcode`.`InvoiceItem` (
  `item_id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL DEFAULT NULL,
  `quantity` VARCHAR(45) NULL DEFAULT NULL,
  `unit_price` VARCHAR(45) NULL DEFAULT NULL,
  `amount` VARCHAR(45) NULL DEFAULT NULL,
  `item_type` VARCHAR(45) NULL DEFAULT NULL,
  `invoice_in_id` INT(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_InvoiceItem_invoice1_idx` (`invoice_in_id` ASC) VISIBLE,
  CONSTRAINT `fk_InvoiceItem_invoice1`
    FOREIGN KEY (`invoice_in_id`)
    REFERENCES `softcode`.`invoice` (`in_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `softcode`.`tax` (
  `tax_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `rate` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`tax_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `softcode`.`BankAccount` (
  `account_id` INT(11) NOT NULL AUTO_INCREMENT,
  `bank_name` VARCHAR(45) NULL DEFAULT NULL,
  `account_name` VARCHAR(45) NULL DEFAULT NULL,
  `account_number` VARCHAR(45) NULL DEFAULT NULL,
  `swift_code` VARCHAR(45) NULL DEFAULT NULL,
  `company_info_com_id` INT(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  INDEX `fk_BankAccount_company_info1_idx` (`company_info_com_id` ASC) VISIBLE,
  CONSTRAINT `fk_BankAccount_company_info1`
    FOREIGN KEY (`company_info_com_id`)
    REFERENCES `softcode`.`company_info` (`com_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `softcode`.`in_status` (
  `status_id` INT(11) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `softcode`.`tax_has_invoice` (
  `tax_tax_id` INT(11) NOT NULL,
  `invoice_in_id` INT(11) NOT NULL,
  `tax_amount` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_tax_has_invoice_invoice1_idx` (`invoice_in_id` ASC) VISIBLE,
  INDEX `fk_tax_has_invoice_tax1_idx` (`tax_tax_id` ASC) VISIBLE,
  CONSTRAINT `fk_tax_has_invoice_tax1`
    FOREIGN KEY (`tax_tax_id`)
    REFERENCES `softcode`.`tax` (`tax_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tax_has_invoice_invoice1`
    FOREIGN KEY (`invoice_in_id`)
    REFERENCES `softcode`.`invoice` (`in_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`,
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`attendance` ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`a_status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`,
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_NIC1`
  FOREIGN KEY (`NIC_nic_number`)
  REFERENCES `softcode`.`NIC` (`nic_number`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`,
DROP FOREIGN KEY `fk_projects_clients1`,
DROP FOREIGN KEY `fk_projects_p_status1`,
DROP FOREIGN KEY `fk_projects_currency1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_p_status1`
  FOREIGN KEY (`p_status_p_id`)
  REFERENCES `softcode`.`p_status` (`p_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`,
DROP FOREIGN KEY `fk_c_payment_clients1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`,
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_r_status1`
  FOREIGN KEY (`r_status_status_id`)
  REFERENCES `softcode`.`r_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`NIC` 
ADD CONSTRAINT `fk_NIC_gender1`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_NIC_n_status1`
  FOREIGN KEY (`n_status_status_id`)
  REFERENCES `softcode`.`n_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`project_manager` 
ADD CONSTRAINT `fk_project_manager_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- MySQL Workbench Synchronization
-- Generated: 2025-09-23 22:10
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_department1`,
DROP FOREIGN KEY `fk_employees_e_status1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_a_status1`;

ALTER TABLE `softcode`.`performance` 
DROP FOREIGN KEY `fk_performance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_c_status1`,
DROP FOREIGN KEY `fk_clients_country1`,
DROP FOREIGN KEY `fk_clients_NIC1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_current_status1`,
DROP FOREIGN KEY `fk_projects_rating1`,
DROP FOREIGN KEY `fk_projects_sla_tracking1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_clients1`,
DROP FOREIGN KEY `fk_c_payment_invoice1`;

ALTER TABLE `softcode`.`online_payment` 
DROP FOREIGN KEY `fk_online_payment_bank1`;

ALTER TABLE `softcode`.`offline_payment` 
DROP FOREIGN KEY `fk_offline_payment_method1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_clients1`,
DROP FOREIGN KEY `fk_reuest_r_status1`;

ALTER TABLE `softcode`.`NIC` 
DROP FOREIGN KEY `fk_NIC_gender1`,
DROP FOREIGN KEY `fk_NIC_n_status1`;

ALTER TABLE `softcode`.`project_manager` 
DROP FOREIGN KEY `fk_project_manager_projects1`;

ALTER TABLE `softcode`.`invoice` 
DROP FOREIGN KEY `fk_invoice_clients1`,
DROP FOREIGN KEY `fk_invoice_employees1`;

ALTER TABLE `softcode`.`InvoiceItem` 
DROP FOREIGN KEY `fk_InvoiceItem_invoice1`;

ALTER TABLE `softcode`.`BankAccount` 
DROP FOREIGN KEY `fk_BankAccount_company_info1`;

ALTER TABLE `softcode`.`tax_has_invoice` 
DROP FOREIGN KEY `fk_tax_has_invoice_invoice1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`r_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`NIC` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`n_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_manager` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`p_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`company_info` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`invoice` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `invoice_date` `invoice_date` DATETIME NULL DEFAULT NULL ,
CHANGE COLUMN `due_date` `due_date` DATETIME NULL DEFAULT NULL ,
CHANGE COLUMN `discount_amount` `discount_amount` TEXT(500) NULL DEFAULT NULL ;

ALTER TABLE `softcode`.`InvoiceItem` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`tax` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`BankAccount` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`in_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`tax_has_invoice` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`,
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`attendance` ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`a_status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`,
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_NIC1`
  FOREIGN KEY (`NIC_nic_number`)
  REFERENCES `softcode`.`NIC` (`nic_number`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`,
DROP FOREIGN KEY `fk_projects_clients1`,
DROP FOREIGN KEY `fk_projects_p_status1`,
DROP FOREIGN KEY `fk_projects_currency1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_p_status1`
  FOREIGN KEY (`p_status_p_id`)
  REFERENCES `softcode`.`p_status` (`p_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`,
DROP FOREIGN KEY `fk_c_payment_offline_payment1`,
DROP FOREIGN KEY `fk_c_payment_projects1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`,
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_r_status1`
  FOREIGN KEY (`r_status_status_id`)
  REFERENCES `softcode`.`r_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`NIC` 
ADD CONSTRAINT `fk_NIC_gender1`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_NIC_n_status1`
  FOREIGN KEY (`n_status_status_id`)
  REFERENCES `softcode`.`n_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`project_manager` 
ADD CONSTRAINT `fk_project_manager_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`invoice` 
DROP FOREIGN KEY `fk_invoice_company_info1`,
DROP FOREIGN KEY `fk_invoice_projects1`;

ALTER TABLE `softcode`.`invoice` ADD CONSTRAINT `fk_invoice_company_info1`
  FOREIGN KEY (`company_info_com_id`)
  REFERENCES `softcode`.`company_info` (`com_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`InvoiceItem` 
ADD CONSTRAINT `fk_InvoiceItem_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`BankAccount` 
ADD CONSTRAINT `fk_BankAccount_company_info1`
  FOREIGN KEY (`company_info_com_id`)
  REFERENCES `softcode`.`company_info` (`com_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`tax_has_invoice` 
DROP FOREIGN KEY `fk_tax_has_invoice_tax1`;

ALTER TABLE `softcode`.`tax_has_invoice` ADD CONSTRAINT `fk_tax_has_invoice_tax1`
  FOREIGN KEY (`tax_tax_id`)
  REFERENCES `softcode`.`tax` (`tax_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tax_has_invoice_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- MySQL Workbench Synchronization
-- Generated: 2025-09-24 20:40
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `softcode`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_employment1`,
DROP FOREIGN KEY `fk_employees_role1`;

ALTER TABLE `softcode`.`attendance` 
DROP FOREIGN KEY `fk_attendance_employees1`;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_currency1`,
DROP FOREIGN KEY `fk_clients_payment_method1`,
DROP FOREIGN KEY `fk_clients_priority_level1`;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_clients1`,
DROP FOREIGN KEY `fk_projects_currency1`;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_offline_payment1`,
DROP FOREIGN KEY `fk_c_payment_projects1`;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_priority1`;

ALTER TABLE `softcode`.`invoice` 
DROP FOREIGN KEY `fk_invoice_company_info1`,
DROP FOREIGN KEY `fk_invoice_projects1`;

ALTER TABLE `softcode`.`tax_has_invoice` 
DROP FOREIGN KEY `fk_tax_has_invoice_tax1`;

ALTER TABLE `softcode`.`employees` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`gender` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`work_location` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`department` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`role` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`e_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`attendance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`a_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`performance` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`clients` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`preferred_communication` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`currency` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority_level` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`projects` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_type` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_phase` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`payment_terms` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`current_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`priority` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`rating` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`sla_tracking` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`c_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`online_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`offline_payment` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`bank` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`method` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`reuest` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`documents` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`uplord_document` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`country` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`r_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`NIC` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`n_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`project_manager` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`p_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`company_info` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`invoice` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
ADD INDEX `fk_invoice_in_status1_idx` (`in_status_status_id` ASC) VISIBLE,
ADD INDEX `fk_invoice_terms_and_conditions1_idx` (`terms_and_conditions_tems_id` ASC) VISIBLE,
DROP INDEX `fk_invoice_terms_and_conditions1_idx` ,
DROP INDEX `fk_invoice_in_status1_idx` ;
;

ALTER TABLE `softcode`.`InvoiceItem` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`tax` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`BankAccount` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`in_status` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`tax_has_invoice` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`terms_and_conditions` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ;

ALTER TABLE `softcode`.`employees` 
DROP FOREIGN KEY `fk_employees_gender`,
DROP FOREIGN KEY `fk_employees_work_location1`;

ALTER TABLE `softcode`.`employees` ADD CONSTRAINT `fk_employees_gender`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_work_location1`
  FOREIGN KEY (`work_location_work_location_id`)
  REFERENCES `softcode`.`work_location` (`work_location_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_employment1`
  FOREIGN KEY (`employment_employment_id`)
  REFERENCES `softcode`.`employment` (`employment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_department1`
  FOREIGN KEY (`department_department_id`)
  REFERENCES `softcode`.`department` (`department_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_role1`
  FOREIGN KEY (`role_role_id`)
  REFERENCES `softcode`.`role` (`role_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_employees_e_status1`
  FOREIGN KEY (`e_status_status_id`)
  REFERENCES `softcode`.`e_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`attendance` 
ADD CONSTRAINT `fk_attendance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_attendance_a_status1`
  FOREIGN KEY (`a_status_status_id`)
  REFERENCES `softcode`.`a_status` (`a_status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`performance` 
ADD CONSTRAINT `fk_performance_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`clients` 
DROP FOREIGN KEY `fk_clients_preferred_communication1`;

ALTER TABLE `softcode`.`clients` ADD CONSTRAINT `fk_clients_preferred_communication1`
  FOREIGN KEY (`preferred_communication_pre_id`)
  REFERENCES `softcode`.`preferred_communication` (`pre_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_payment_method1`
  FOREIGN KEY (`payment_method_payment_method`)
  REFERENCES `softcode`.`payment_method` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_priority_level1`
  FOREIGN KEY (`priority_level_priority_level_id`)
  REFERENCES `softcode`.`priority_level` (`priority_level_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_c_status1`
  FOREIGN KEY (`c_status_status_id`)
  REFERENCES `softcode`.`c_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_country1`
  FOREIGN KEY (`country_country_id`)
  REFERENCES `softcode`.`country` (`country_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clients_NIC1`
  FOREIGN KEY (`NIC_nic_number`)
  REFERENCES `softcode`.`NIC` (`nic_number`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`projects` 
DROP FOREIGN KEY `fk_projects_project_type1`,
DROP FOREIGN KEY `fk_projects_project_phase1`,
DROP FOREIGN KEY `fk_projects_payment_terms1`,
DROP FOREIGN KEY `fk_projects_priority1`,
DROP FOREIGN KEY `fk_projects_p_status1`;

ALTER TABLE `softcode`.`projects` ADD CONSTRAINT `fk_projects_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_project_phase1`
  FOREIGN KEY (`project_phase_phase_id`)
  REFERENCES `softcode`.`project_phase` (`phase_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_payment_terms1`
  FOREIGN KEY (`payment_terms_terms_id`)
  REFERENCES `softcode`.`payment_terms` (`terms_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_current_status1`
  FOREIGN KEY (`current_status_status_id`)
  REFERENCES `softcode`.`current_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_rating1`
  FOREIGN KEY (`rating_rating`)
  REFERENCES `softcode`.`rating` (`rating_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_sla_tracking1`
  FOREIGN KEY (`sla_tracking_sla_id`)
  REFERENCES `softcode`.`sla_tracking` (`sla_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_p_status1`
  FOREIGN KEY (`p_status_p_id`)
  REFERENCES `softcode`.`p_status` (`p_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_projects_currency1`
  FOREIGN KEY (`currency_currency_id`)
  REFERENCES `softcode`.`currency` (`currency_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`c_payment` 
DROP FOREIGN KEY `fk_c_payment_online_payment1`;

ALTER TABLE `softcode`.`c_payment` ADD CONSTRAINT `fk_c_payment_online_payment1`
  FOREIGN KEY (`online_payment_pyament_id`)
  REFERENCES `softcode`.`online_payment` (`pyament_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_offline_payment1`
  FOREIGN KEY (`offline_payment_payment_id`)
  REFERENCES `softcode`.`offline_payment` (`payment_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_c_payment_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`online_payment` 
ADD CONSTRAINT `fk_online_payment_bank1`
  FOREIGN KEY (`bank_bank_id`)
  REFERENCES `softcode`.`bank` (`bank_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`offline_payment` 
ADD CONSTRAINT `fk_offline_payment_method1`
  FOREIGN KEY (`method_method_id`)
  REFERENCES `softcode`.`method` (`method_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`reuest` 
DROP FOREIGN KEY `fk_reuest_project_type1`;

ALTER TABLE `softcode`.`reuest` ADD CONSTRAINT `fk_reuest_project_type1`
  FOREIGN KEY (`project_type_project_type_id`)
  REFERENCES `softcode`.`project_type` (`project_type_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_priority1`
  FOREIGN KEY (`priority_priority_id`)
  REFERENCES `softcode`.`priority` (`priority_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reuest_r_status1`
  FOREIGN KEY (`r_status_status_id`)
  REFERENCES `softcode`.`r_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`NIC` 
ADD CONSTRAINT `fk_NIC_gender1`
  FOREIGN KEY (`gender_gender_id`)
  REFERENCES `softcode`.`gender` (`gender_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_NIC_n_status1`
  FOREIGN KEY (`n_status_status_id`)
  REFERENCES `softcode`.`n_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`project_manager` 
ADD CONSTRAINT `fk_project_manager_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`invoice` 
ADD CONSTRAINT `fk_invoice_company_info1`
  FOREIGN KEY (`company_info_com_id`)
  REFERENCES `softcode`.`company_info` (`com_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_clients1`
  FOREIGN KEY (`clients_client_id`)
  REFERENCES `softcode`.`clients` (`client_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_projects1`
  FOREIGN KEY (`projects_projects_id`)
  REFERENCES `softcode`.`projects` (`projects_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_employees1`
  FOREIGN KEY (`employees_employee_id`)
  REFERENCES `softcode`.`employees` (`employee_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_in_status1`
  FOREIGN KEY (`in_status_status_id`)
  REFERENCES `softcode`.`in_status` (`status_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_invoice_terms_and_conditions1`
  FOREIGN KEY (`terms_and_conditions_tems_id`)
  REFERENCES `softcode`.`terms_and_conditions` (`tems_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`InvoiceItem` 
ADD CONSTRAINT `fk_InvoiceItem_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`BankAccount` 
ADD CONSTRAINT `fk_BankAccount_company_info1`
  FOREIGN KEY (`company_info_com_id`)
  REFERENCES `softcode`.`company_info` (`com_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `softcode`.`tax_has_invoice` 
ADD CONSTRAINT `fk_tax_has_invoice_tax1`
  FOREIGN KEY (`tax_tax_id`)
  REFERENCES `softcode`.`tax` (`tax_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tax_has_invoice_invoice1`
  FOREIGN KEY (`invoice_in_id`)
  REFERENCES `softcode`.`invoice` (`in_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- MySQL Workbench Synchronization
-- Generated: 2025-09-25 08:54
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Shehan Chamika

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `softcode`.`invoice` 
DROP FOREIGN KEY `fk_invoice_terms_and_conditions1`;

ALTER TABLE `softcode`.`invoice` 
DROP COLUMN `terms_and_conditions_tems_id`,
DROP COLUMN `tax_ammount`,
DROP COLUMN `payment_terms`,
ADD COLUMN `signature_date` DATE NULL DEFAULT NULL AFTER `in_status_status_id`,
ADD COLUMN `signature_name&titel` VARCHAR(45) NULL DEFAULT NULL AFTER `signature_date`,
DROP INDEX `fk_invoice_terms_and_conditions1_idx` ;
;

ALTER TABLE `softcode`.`invoiceitem` 
DROP COLUMN `item_type`,
DROP COLUMN `unit_price`,
DROP COLUMN `quantity`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

<!-- new update -->

CREATE TABLE login_sessions (
  session_id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  logout_time TIMESTAMP NULL,
  ip_address VARCHAR(50),
  device_info VARCHAR(100),
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

CREATE TABLE system_activities (
  activity_id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  action_type ENUM('LOGIN','LOGOUT','INSERT','UPDATE','DELETE','VIEW','UPLOAD','DOWNLOAD','ACCESS'),
  description TEXT, -- mokakda kala kiyala details
  table_name VARCHAR(50), -- mona table eke data wenas kala
  record_id INT, -- wenas kala row id (ex: employee_id = 5)
  page_url VARCHAR(200), -- user giyapu page / module
  ip_address VARCHAR(50),
  device_info VARCHAR(150),
  browser_info VARCHAR(150),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);





-- -------------------------
-- Invoice table
-- -------------------------


-- -------------------------
-- Junction table: Invoice ↔ Services (One invoice, many services)
-- -------------------------
CREATE TABLE invoice_has_services (
  in_id INT,
  ser_id INT,
  PRIMARY KEY (in_id, ser_id),
  CONSTRAINT fk_inv_has_ser_invoice FOREIGN KEY (in_id) REFERENCES invoice(in_id),
  CONSTRAINT fk_inv_has_ser_service FOREIGN KEY (ser_id) REFERENCES services(ser_id)
);

-- -------------------------
-- Junction table: Invoice ↔ Timeline (One invoice, many milestones)
-- -------------------------
CREATE TABLE invoice_has_timeline (
  in_id INT,
  time_id INT,
  PRIMARY KEY (in_id, time_id),
  CONSTRAINT fk_inv_has_time_invoice FOREIGN KEY (in_id) REFERENCES invoice(in_id),
  CONSTRAINT fk_inv_has_time_timeline FOREIGN KEY (time_id) REFERENCES timeline(time_id)
);


ALTER TABLE invoice
ADD COLUMN overview_over_id INT,
ADD CONSTRAINT fk_invoice_overview
  FOREIGN KEY (overview_over_id)
  REFERENCES overview(over_id);


-- -------------------------
-- Overview table
-- -------------------------
CREATE TABLE overview (
  over_id INT AUTO_INCREMENT PRIMARY KEY,
  over_title VARCHAR(100) NOT NULL,
  over_subtitle VARCHAR(200),
  description MEDIUMTEXT
);

-- -------------------------
-- Services table
-- -------------------------
CREATE TABLE services (
  ser_id INT AUTO_INCREMENT PRIMARY KEY,
  service VARCHAR(500) NOT NULL
);

-- -------------------------
-- Timeline table
-- -------------------------
CREATE TABLE timeline (
  time_id INT AUTO_INCREMENT PRIMARY KEY,
  milestone VARCHAR(150) NOT NULL,
  date DATE
);



-- -------------------------
-- Junction table: Invoice ↔ Services (One invoice, many services)
-- -------------------------
CREATE TABLE invoice_has_services (
  in_id INT,
  ser_id INT,
  PRIMARY KEY (in_id, ser_id),
  CONSTRAINT fk_inv_has_ser_invoice FOREIGN KEY (in_id) REFERENCES invoice(in_id),
  CONSTRAINT fk_inv_has_ser_service FOREIGN KEY (ser_id) REFERENCES services(ser_id)
);

-- -------------------------
-- Junction table: Invoice ↔ Timeline (One invoice, many milestones)
-- -------------------------
CREATE TABLE invoice_has_timeline (
  in_id INT,
  time_id INT,
  PRIMARY KEY (in_id, time_id),
  CONSTRAINT fk_inv_has_time_invoice FOREIGN KEY (in_id) REFERENCES invoice(in_id),
  CONSTRAINT fk_inv_has_time_timeline FOREIGN KEY (time_id) REFERENCES timeline(time_id)
);

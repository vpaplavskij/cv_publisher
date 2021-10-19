<?php

namespace cv\Controllers;

use cv\Core\Database;

class CreateController
{
    public function cv(): void
    {
        $pdo = Database::getInstance()->connection();
        // Saving personal information to db
        $stmt = $pdo->prepare("INSERT INTO person (name, surname, phone, mail)
                                            VALUES (:name, :surname, :phone, :mail)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':surname', $_POST['surname']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':mail', $_POST['email']);
        $stmt->execute();
        $personId = $pdo->lastInsertId();

        $stmt = $pdo->prepare("INSERT INTO address (person_id, country, post_index, city, street, street_number)
                                            VALUES (:person_id, :country, :post_index, :city, :street, :street_number)");
        $stmt->bindParam(':person_id', $personId);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':post_index', $_POST['post_index']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':street', $_POST['street']);
        $stmt->bindParam(':street_number', $_POST['street_number']);
        $stmt->execute();

        // Saving education information to db
        $stmt = $pdo->prepare("INSERT INTO education (person_id, school_name, faculty, study_field, status, started_at, finished_at)
                                    VALUES (:person_id, :school, :faculty, :study_field, :status, :started_at, :finished_at)");
        $stmt->bindParam(':person_id', $personId);
        $stmt->bindParam(':school', $_POST['school']);
        $stmt->bindParam(':faculty', $_POST['faculty']);
        $stmt->bindParam(':study_field', $_POST['study_field']);
        $stmt->bindParam(':status', $_POST['study_status']);
        if (!empty($_POST['study_start'])) {
            $stmt->bindParam(':started_at', $_POST['study_start']);
        } else {
            $stmt->bindValue(':started_at', null);
        }
        if (!empty($_POST['study_end'])) {
            $stmt->bindParam(':finished_at', $_POST['study_end']);
        } else {
            $stmt->bindValue(':finished_at', null);
        }
        $stmt->execute();

        // Saving job information to db
        $stmt = $pdo->prepare("INSERT INTO job (person_id, company_name, position, contract_type, started_at, finished_at)
                                    VALUES (:person_id, :job_name, :position, :contract_type, :started_at, :finished_at)");
        $stmt->bindParam(':person_id', $personId);
        $stmt->bindParam(':job_name', $_POST['job_name']);
        $stmt->bindParam(':position', $_POST['position']);
        $stmt->bindParam(':contract_type', $_POST['work_type']);
        if (!empty($_POST['job_start'])) {
            $stmt->bindParam(':started_at', $_POST['job_start']);
        } else {
            $stmt->bindValue(':started_at', null);
        }
        if (!empty($_POST['job_end'])) {
            $stmt->bindParam(':finished_at', $_POST['job_end']);
        } else {
            $stmt->bindValue(':finished_at', null);
        }
        $stmt->execute();

        header("Location:/");
    }

    public function education(): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("INSERT INTO education 
                            (person_id, school_name, faculty, study_field, status, started_at, finished_at)
                            VALUES (:person_id, :school, :faculty, :study_field, :status, :started_at, :finished_at)");
        $stmt->bindParam(':person_id', $_POST['person_id']);
        $stmt->bindParam(':school', $_POST['school']);
        $stmt->bindParam(':faculty', $_POST['faculty']);
        $stmt->bindParam(':study_field', $_POST['study_field']);
        $stmt->bindParam(':status', $_POST['study_status']);
        if (!empty($_POST['study_start'])) {
            $stmt->bindParam(':started_at', $_POST['study_start']);
        } else {
            $stmt->bindValue(':started_at', null);
        }
        if (!empty($_POST['study_end'])) {
            $stmt->bindParam(':finished_at', $_POST['study_end']);
        } else {
            $stmt->bindValue(':finished_at', null);
        }
        $stmt->execute();
        header('Location:/');
    }

    public function job(): void
    {
        $pdo = Database::getInstance()->connection();

        $stmt = $pdo->prepare("INSERT INTO job 
                            (person_id, company_name, position, contract_type, started_at, finished_at)
                            VALUES (:person_id, :job_name, :position, :contract_type, :started_at, :finished_at)");
        $stmt->bindParam(':person_id', $_POST['person_id']);
        $stmt->bindParam(':job_name', $_POST['job_name']);
        $stmt->bindParam(':position', $_POST['position']);
        $stmt->bindParam(':contract_type', $_POST['work_type']);
        if (!empty($_POST['job_start'])) {
            $stmt->bindParam(':started_at', $_POST['job_start']);
        } else {
            $stmt->bindValue(':started_at', null);
        }
        if (!empty($_POST['job_end'])) {
            $stmt->bindParam(':finished_at', $_POST['job_end']);
        } else {
            $stmt->bindValue(':finished_at', null);
        }
        $stmt->execute();

        header("Location:/");
    }

    public function interest(): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("INSERT INTO interests
                            (person_id, interests)
                            VALUES (:person_id, :interests)");
        $stmt->bindParam(':person_id', $_POST['person_id']);
        $stmt->bindParam(':interests', $_POST['interests']);
        $stmt->execute();

        header("Location:/");
    }


}
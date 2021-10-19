<?php

namespace cv\Controllers;


use cv\Core\Database;

class UpdateController
{
    public function personalInfo()
    {
        $pdo = Database::getInstance()->connection();
        // Saving personal information to db
        $stmt = $pdo->prepare("UPDATE person SET name=:name, surname=:surname, phone=:phone, mail=:mail
                                    WHERE id = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':surname', $_POST['surname']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':mail', $_POST['email']);
        $stmt->execute();

        $stmt = $pdo->prepare("UPDATE address SET country=:country, post_index=:post_index, city=:city,
                                    street=:street, street_number=:street_number WHERE person_id = :person_id");
        $stmt->bindParam(':person_id', $_POST['id']);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':post_index', $_POST['post_index']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':street', $_POST['street']);
        $stmt->bindParam(':street_number', $_POST['street_number']);
        $stmt->execute();

        header("Location:/");
    }

    public function education(): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("UPDATE education SET school_name=:school, faculty=:faculty, study_field=:study_field,
                                status=:status, started_at=:started_at, finished_at=:finished_at WHERE id = :id");
        $stmt->bindParam(':id', $_POST['edu_id']);
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

        $stmt = $pdo->prepare("UPDATE job SET company_name=:job_name, position=:position, contract_type=:work_type,
                                    started_at=:started_at, finished_at=:finished_at WHERE id = :id");
        $stmt->bindParam(':id', $_POST['job_id']);
        $stmt->bindParam(':job_name', $_POST['job_name']);
        $stmt->bindParam(':position', $_POST['position']);
        $stmt->bindParam(':work_type', $_POST['work_type']);
        if (!empty($_POST['job_start'])) {
            $stmt->bindParam(':started_at', $_POST['job_start']);
        } else {
            var_dump('d');
            $stmt->bindValue(':started_at', null);
        }
        if (!empty($_POST['job_end'])) {
            $stmt->bindParam(':finished_at', $_POST['job_end']);
        } else {
            var_dump('d');
            $stmt->bindValue(':finished_at', null);
        }
        $stmt->execute();

        header("Location:/");
    }

    public function interest(): void
    {
        $pdo = Database::getInstance()->connection();

        $stmt = $pdo->prepare("UPDATE interests SET interests=:interests WHERE id = :id");
        $stmt->bindParam(':id', $_POST['interest_id']);
        $stmt->bindParam(':interests', $_POST['interests']);
        $stmt->execute();

        header("Location:/");
    }
}

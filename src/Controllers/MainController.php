<?php

namespace cv\Controllers;

use cv\Core\Database;
use cv\Core\View;
use PDO;

class MainController
{
    public function showHome(): void
    {
        $pdo = Database::getInstance()->connection();

        $stmt = $pdo->prepare("SELECT id,name,surname FROM person");
        $stmt->execute();
        $cvs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        View::show('home.php', [
            $cvs,
        ]);
    }

    public function showNewForm(): void
    {
        View::show('new-form.php');
    }

    public function print(array $params): void
    {
        $pdo = Database::getInstance()->connection();

        $stmt = $pdo->prepare('SELECT * FROM person as p LEFT JOIN 
                                     address as a ON p.id = a.person_id WHERE p.id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT * FROM education WHERE person_id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT * FROM job as j INNER JOIN
                                    job_details as jd ON j.id = jd.job_id
                                WHERE j.person_id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT * FROM interests WHERE person_id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $interests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        View::showEdit('resume-look.php', [
            $personalInfo,
            $educations,
            $jobs,
            $interests
        ]);
    }


    public function showEditForm(array $params): void
    {
        $pdo = Database::getInstance()->connection();

        $stmt = $pdo->prepare('SELECT * FROM person as p INNER JOIN 
                                     address as a ON p.id = a.person_id WHERE p.id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT * FROM education WHERE person_id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT * FROM job WHERE person_id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT * FROM interests WHERE person_id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $interests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        View::showEdit('edit.php', [
            $personalInfo,
            $educations,
            $jobs,
            $interests
        ]);
    }

    public function showNewEducationForm(array $params): void
    {
        View::show('education-clean.php', [
            $params['id'],
        ]);
    }

    public function editEducationForm(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare('SELECT * FROM education WHERE id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        View::show('education-edit.php', [
            $data,
        ]);
    }

    public function showNewJobForm(array $params): void
    {
        View::show('job-clean.php', [
            $params['id'],
        ]);
    }

    public function editJobForm(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare('SELECT * FROM job where id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        View::show('job-edit.php', [
            $data,
        ]);
    }

    public function showNewInterestsForm(array $params): void
    {
        View::show('interests-clean.php', [
            $params['id'],
        ]);
    }

    public function editInterestsForm(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare('SELECT * FROM interests where id = :id');
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        View::show('interests-edit.php', [
            $data,
        ]);
    }


}
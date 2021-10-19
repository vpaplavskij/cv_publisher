<?php

namespace cv\Controllers;

use cv\Core\Database;

class DeleteController
{
    public function cv(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("DELETE job, job_details FROM job INNER JOIN
                                    job_details ON job.id = job_details.job_id
                                    WHERE person_id = :id");
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();

        $stmt = $pdo->prepare("DELETE p, e, a
                                   FROM person as p INNER JOIN
                                   address as a ON p.id = a.person_id INNER JOIN
                                   education as e ON p.id = e.person_id
                                   WHERE p.id = :id");
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();

        header("Location:/");
    }

    public function education(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("DELETE from education WHERE id = :id");
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();

        header("Location:/");
    }

    public function job(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("DELETE from job_details WHERE job_id = :id");
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();

        $stmt = $pdo->prepare("DELETE from job WHERE id = :id");
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();

        header("Location:/");
    }

    public function interest(array $params): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare("DELETE from interests WHERE id = :id");
        $stmt->bindParam(':id', $params['id']);
        $stmt->execute();

        header("Location:/");
    }
}
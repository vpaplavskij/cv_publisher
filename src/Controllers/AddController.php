<?php

namespace cv\Controllers;

use cv\Core\Database;
use cv\Core\View;

class AddController
{
    public function showJobDescription(array $params): void
    {
        View::show('job-add-description.php', [
            $params['id'],
        ]);
    }

    public function addJobDescription(): void
    {
        $pdo = Database::getInstance()->connection();
        $stmt = $pdo->prepare('INSERT INTO job_details (job_id, description, type) 
                                    VALUES (:job_id, :description, :type)');
        $stmt->bindParam(':job_id', $_POST['job_id']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->execute();

        header("Location:/");
    }



}
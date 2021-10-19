<?php

namespace cv\Core;

class View
{
    public static function show(string $path, array $variables = [])
    {
        if (!empty($variables)) {
            extract($variables);
        }
        require 'src/Views/' . $path;
    }

    public static function showEdit(string $path, array $variables = [])
    {
        if (!empty($variables[0])) {
            $personal = $variables[0];
        }
        if (!empty($variables[1])) {
            $educations = $variables[1];
        }
        if (!empty($variables[2])) {
            $jobs = $variables[2];
        }
        if (!empty($variables[3])) {
            $interests = $variables[3];
        }

        require 'src/Views/' . $path;
    }
}


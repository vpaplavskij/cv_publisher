<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/font-awesome/css/all.css">

    <title>Cv publisher</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-4 text-center">
            <a href="/new"><i class="fas fa-plus-circle fa-4x" style="color: green"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        <?php foreach ($variables[0] as $cvs)
            echo '<div class="card" style="width: 18rem;">';
//        echo '<img src="https://via.placeholder.com/150x100/O" class="card-img-top" alt="cv image">';
                echo '<h4 class="text-center mt-2">'. $cvs['name'] .'</h4>';
                echo '<h4 class="text-center">'. $cvs['surname'] .'</h4>';
                echo '<h4 class="text-center">CV</h4><hr>';

        echo '<div class="card-body">';
        echo '<div class="card-text d-flex justify-content-around">';
        echo '<a href="/print/' . $cvs['id'] . '"><i class="fas fa-print" style="color: #157347; font-size: 26px"></i></a>';
        echo '<a href="/edit/' . $cvs['id'] . '"><i class="fas fa-tools" style="color: #157347; font-size: 26px"></i></a>';
        echo '<a href="/delete/cv/' . $cvs['id'] . '"><i class="fas fa-trash-restore-alt" style="color: red; font-size: 26px"></i></a>';
        echo '</div></div>'
        ?>
    </div>
</div>
</div>

</body>
</html>
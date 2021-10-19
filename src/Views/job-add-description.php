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
    <form action="/add/job/description" method="post" class="row">
        <div class="col-4 d-flex flex-column">
        </div>
        <div class="col-4 d-flex flex-column">
            <input value="<?php echo $variables[0] ?>" name="job_id" hidden>
            <h2 class="align-self-center"><span class="badge bg-warning">Work</span></h2>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Type of work</span>
                <input type="text" class="form-control" name="type" required>
            </div>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Short description</span>
                <input type="text" class="form-control" name="description" required>
            </div>


            <button type="submit" class="offset-4 col-4 btn btn-primary mt-3">Add to job!</button>

        </div>

        <div class="col-4 d-flex flex-column">
        </div>
    </form>
</div>
</body>

</html>
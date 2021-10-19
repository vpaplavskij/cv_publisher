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
    <form action="/new/interest" method="post" class="row">
        <div class="col-4 d-flex flex-column">
        </div>
        <div class="col-4 d-flex flex-column">
            <input value="<?php echo $variables[0] ?>" name="person_id" hidden>

            <h2 class="align-self-center"><span class="badge bg-info">Interests</span></h2>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Interest of</span>
                <input type="text" class="form-control" name="interests">
            </div>
            <button type="submit" class="offset-4 col-4 btn btn-primary mt-3">Create New</button>
        </div>

        <div class="col-4 d-flex flex-column">
        </div>
    </form>
</div>
</body>
<script>
    function changeStudyEnd() {
        studyStatus = document.getElementById("study_status")
        if (studyStatus.value === "In progress") {
            document.getElementById("study-block").style.display = "none";
            document.getElementById("study-block").setAttribute('value', '0')
        } else {
            document.getElementById("study-block").style.display = "block";
        }
    }
    changeStudyEnd()
</script>
</html>
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
    <form action="/new/education" method="post" class="row">
        <div class="col-4 d-flex flex-column">
        </div>
        <div class="col-4 d-flex flex-column">
            <input value="<?php echo $variables[0] ?>" name="person_id" hidden>

            <h2 class="align-self-center"><span class="badge bg-info">Education</span></h2>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input type="text" class="form-control" name="school">
            </div>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Faculty</span>
                <input type="text" class="form-control" name="faculty">
            </div>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Field of Study</span>
                <input type="text" class="form-control" name="study_field">
            </div>
            <div class="input-group flex-nowrap m-2">
                <select class="form-select" aria-label="Default select example" name="study_status" id="study_status"
                        onchange="changeStudyEnd()">
                    <option selected disabled>Status</option>
                    <option value="Finished">Finished</option>
                    <option value="In progress">In progress</option>
                    <option value="Discontinued">Discontinued</option>
                </select>
            </div>
            <div class="input-group flex-nowrap m-2 d-flex justify-content-around">
                <label for="start">Start date:</label>
                <input type="date" name="study_start"
                       min="1980-01-01" max="2021-10-15">
            </div>
            <div id="study-block">
                <div class="input-group flex-nowrap m-2 d-flex justify-content-around">
                    <label for="start">End date:</label>
                    <input type="date" name="study_end"
                           min="1980-01-01" max="2030-12-31">
                </div>
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
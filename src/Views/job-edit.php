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
    <form action="/update/job" method="post" class="row">
        <div class="col-4 d-flex flex-column">
        </div>
        <div class="col-4 d-flex flex-column">
            <input value="<?php echo $variables[0]['id'] ?>" name="job_id" hidden>
            <h2 class="align-self-center"><span class="badge bg-warning">Job Experience</span></h2>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Company</span>
                <input type="text" class="form-control" name="job_name" required value="<?php echo $variables[0]['company_name'] ?>">
            </div>
            <div class="input-group flex-nowrap m-2">
                <span class="input-group-text" id="addon-wrapping">Position</span>
                <input type="text" class="form-control" name="position" required value="<?php echo $variables[0]['position'] ?>">
            </div>
            <div class="input-group flex-nowrap m-2">
                <select class="form-select" aria-label="Default select example" name="work_type" required>
                    <option selected value="<?php echo $variables[0]['contract_type'] ?>">
                       <?php echo $variables[0]['contract_type'] ?></option>
                    <option value="Full time">Full time</option>
                    <option value="Part time">Part time</option>
                    <option value="Fixed term">Fixed term contract</option>
                    <option value="Zero hour">Zero hour contract</option>
                    <option value="Freelance contract">Freelance contract</option>
                </select>
            </div>
            <div class="input-group flex-nowrap m-2 d-flex justify-content-between">
                <label for="start">Start date:</label>
                <input type="date" name="job_start"
                       min="1980-01-01" max="2021-10-15">
            </div>
            <div class="input-group flex-nowrap m-2 d-flex justify-content-between">
                <div class="form-check form-switch">
                    <input onclick="changeState()" class="form-check-input" type="checkbox" id="flexSwitch">
                </div>
                <div id="block-end" style="display: none">
                    <label for="start">End date: </label>
                    <input type="date" id="job_end" name="job_end" value="0"
                           min="1980-01-01" max="2030-12-31">
                </div>
            </div>
            <button type="submit" class="offset-4 col-4 btn btn-primary mt-3">Edit!</button>

        </div>

        <div class="col-4 d-flex flex-column">
        </div>
    </form>
</div>
</body>
<script>
    function changeState() {
        if (document.getElementById("block-end").style.display === "none") {
            document.getElementById("block-end").style.display = "block";
        } else {
            document.getElementById("block-end").style.display = "none";
            document.getElementById("block-end").setAttribute('value', '0');
        }
    }

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
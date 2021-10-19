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
    <div class="row">
        <div class="col-4 d-flex flex-column">
            <h2 class="align-self-center"><span class="badge bg-success">Personal Information</span></h2>
            <form action="/update/personal" method="post">
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Name</span>
                    <input type="text" class="form-control" value="<?php echo $personal['name'] ?>" name="name" required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Surname</span>
                    <input type="text" class="form-control" value="<?php echo $personal['surname'] ?>" name="surname" required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Phone</span>
                    <input type="number" class="form-control" value="<?php echo $personal['phone'] ?>" name="phone" required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Email</span>
                    <input type="text" class="form-control" value="<?php echo $personal['mail'] ?>" name="email" required>
                </div>

                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Country</span>
                    <input type="text" class="form-control" value="<?php echo $personal['country'] ?>" name="country" required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Postal code</span>
                    <input type="text" class="form-control" value="<?php echo $personal['post_index'] ?>" name="post_index"
                           required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">City</span>
                    <input type="text" class="form-control" value="<?php echo $personal['city'] ?>" name="city" required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Street</span>
                    <input type="text" class="form-control" value="<?php echo $personal['street'] ?>" name="street" required>
                </div>
                <div class="input-group flex-nowrap m-2">
                    <span class="input-group-text" id="addon-wrapping">Street number</span>
                    <input type="text" class="form-control" value="<?php echo $personal['street_number'] ?>" name="street_number"
                           required>
                </div>
                <input type="text" value="<?php echo $personal['id'] ?>" name="id" hidden>
                <button type="submit" class="offset-4 col-4 btn btn-success mt-3">Update!</button>
            </form>
        </div>
        <div class="col-4 d-flex flex-column">
            <h2 class="align-self-center"><span class="badge bg-info">Education</span></h2>
            <?php foreach ($educations as $edu)
                echo "<ul class='list-group'>
                          <li class='list-group-item m-2'>
                          <span class='float-start p-1'>$edu[school_name]</span>
                          <a href='/delete/education/$edu[id]' class='float-end p-1'><i class='fas fa-trash-alt' style='color: red'></i></a>
                          <a href='/edit/education/$edu[id]' class='float-end p-1'><i class='fas fa-edit'></i></a>
                          </li>
                          </ul>"
            ?>
            <div class="input-group flex-nowrap m-2 d-flex justify-content-center">
                <a href="/new/education/<?php echo $personal['id'] ?>"><i class="fas fa-plus-circle fa-2x"
                                                                          style="color: #0dcaf0"></i></a>
            </div>
            <h2 class="align-self-center"><span class="badge bg-primary">Interests</span></h2>

            <?php foreach ($interests as $int)
                echo "<ul class='list-group'>
                          <li class='list-group-item m-2'>
                          <span class='float-start p-1'>$int[interests]</span>
                          <a href='/delete/interest/$int[id]' class='float-end p-1'><i class='fas fa-trash-alt' style='color: red'></i></a>
                          <a href='/edit/interest/$int[id]' class='float-end p-1'><i class='fas fa-edit'></i></a>
                          </li>
                          </ul>"
            ?>
            <div class="input-group flex-nowrap m-2 d-flex justify-content-center">
                <a href="/new/interests/<?php echo $personal['id'] ?>"><i class="fas fa-plus-circle fa-2x"
                                                                          style="color: #0d6efd"></i></a>
            </div>
        </div>
        <div class="col-4 d-flex flex-column">
            <h2 class="align-self-center"><span class="badge bg-warning">Job Experience</span></h2>
            <?php foreach ($jobs as $job)
                echo "<ul class='list-group'>
                          <li class='list-group-item m-2'>
                          <span class='float-start p-1'>$job[company_name]</span>
                          <a href='/delete/job/$job[id]' class='float-end p-1'><i class='fas fa-trash-alt' style='color: red'></i></a>
                          <a href='/edit/job/$job[id]' class='float-end p-1'><i class='fas fa-edit'></i></a>
                          <a href='/add/job/description/$job[id]' class='float-end p-1'>
                          <i class='fas fa-puzzle-piece' style='color: green'></i></a>
                          </li>
                          </ul>"
            ?>
            <div class="input-group flex-nowrap m-2 d-flex justify-content-center">
                <a href="/new/job/<?php echo $personal['id'] ?>"><i class="fas fa-plus-circle fa-2x"
                                                                    style="color: #ffc107"></i></a>
            </div>
        </div>
    </div>
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
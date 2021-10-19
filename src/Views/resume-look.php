<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='/public/custom/style.css' rel='stylesheet' type='text/css'>

<div class="container">
    <div class="header">
        <div class="full-name">
            <span class="first-name"><?php echo $personal['name'] ?></span>
            <span class="last-name"><?php echo $personal['surname'] ?></span>
        </div>
        <div class="contact-info">
            <span class="email">Email: </span>
            <span class="email-val"><?php echo $personal['mail'] ?></span>
            <span class="separator"></span>
            <span class="phone">Phone: </span>
            <span class="phone-val"><?php echo $personal['phone'] ?></span>
        </div>
    </div>
    <div class="details">
        <div class="section">
            <div class="section__title">Experience</div>
            <div class="section__list">
                <?php foreach ($jobs as $job) {
                    echo '<div class="section__list-item">';
                    echo '<div class="left">';
                    echo '<div class="name">' . $job['company_name'] . '</div>';
                    echo '        <div class="addr">' . $job['position'] . '</div>';
                    echo '        <div class="duration">' . date("d M Y", strtotime($job['started_at'])) .
                        ' - ' . date("d M Y", strtotime($job['finished_at'])) . '</div></div>';

                    echo '    <div class="right">';
                    echo '        <div class="name">' . $job['type'] . '</div>';
                    echo '        <div class="desc">' . $job['description'] . '</div></div></div>';
                }
                ?>
            </div>
        </div>
        <div class="section">
            <div class="section__title">Education</div>
            <div class="section__list">
                <?php foreach ($educations as $edu) {
                    echo '<div class="section__list-item">';
                    echo '<div class="left">';
                    echo '<div class="name">' . $edu['school_name'] . '</div>';
                    echo '        <div class="addr">' . $edu['faculty'] . '</div>';
                    echo '        <div class="duration">' . date("d M Y", strtotime($edu['started_at'])) .
                        ' - ' . date("d M Y", strtotime($edu['finished_at'])) . '</div></div>';
                    echo '    <div class="right">';
                    echo '        <div class="name">' . $edu['type'] . '</div>';
                    echo '        <div class="desc">' . $edu['description'] . '</div></div></div>';
                }
                ?>
            </div>
        </div>

        <div class="section">
            <div class="section__title">
                Interests
            </div>
            <div class="section__list">
                <?php foreach ($interests as $interest) {
                    echo '<div class="section__list-item" style="margin-bottom: 10px;">';
                    echo  $interest['interests'];
                    echo '</div>';
                }?>
            </div>
        </div>
    </div>
</div>

<script>
    // window.print()
</script>

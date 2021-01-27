<?php require('partials/head.php'); ?>
<div class="wrapper justify-content-center">
    <section class="hero">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.7615498732034!2d-118.34587228439435!3d34.10124852259263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2s7060%20Hollywood%20Blvd%2C%20Los%20Angeles%2C%20CA%2090028%2C%20USA!5e0!3m2!1sen!2sua!4v1611071178556!5m2!1sen!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="map_frame"></iframe>
    </section>
    <form method="POST" action="/names">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
    <?php foreach ($data as $user) : ?>
        <li>
            <?= $user->first_name; ?>
        </li>
    <?php endforeach; ?>
    <form class="form" id="first-form" method="post">
        <div class="form_wrapper">
            <div class="form_header">
                <div class="row">
                    <div class="col-sm-12 form_title">
                        <h1 class="title">To participate in the conference, please fill out the form</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form_progress">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="first_step"><strong>First Step</strong></li>
                            <li id="second_step"><strong>Second Step</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="form_body">
                <fieldset>
                    <div class="form_card">
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="birthdate">Birth Date</label>
                                <input type="date" name="birthdate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="report_subject">Report Subject</label>
                                <input type="text" name="report_subject">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="country">Country</label>
                                <input type="text" name="country">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" name="phone_number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="email">Email</label>
                                <input type="email" name="email">
                            </div>
                        </div>
                    </div>
                    <button id="first_btn" class="next action-button">Next</button>
                </fieldset>
                <fieldset>
                    <?php require ('secondform.view.php'); ?>
                </fieldset>
            </div>
        </div>
    </form>
</div>
<div id="result_form"></div>
<script src="script.js"></script>
<?php require('partials/footer.php'); ?>


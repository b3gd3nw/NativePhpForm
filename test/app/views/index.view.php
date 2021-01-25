<html>
<head>
    <title>TEST</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper justify-content-center">
    <section class="hero">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.7615498732034!2d-118.34587228439435!3d34.10124852259263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2s7060%20Hollywood%20Blvd%2C%20Los%20Angeles%2C%20CA%2090028%2C%20USA!5e0!3m2!1sen!2sua!4v1611071178556!5m2!1sen!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="map_frame"></iframe>
    </section>
    <h1> All Users</h1>
    <div>
        <?php foreach ($data as $user) : ?>
            <li>
                <?= $user->first_name; ?>
            </li>
        <?php endforeach; ?>
    </div>

    <form method="POST" action="/users">
        <input type="text" name="first_name">
        <button type="submit">Submit</button>
    </form>
    <form class="form" id="first-form">
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
                                <input type="date" name="birth_date">
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
                    <button type="submit" class="next action-button">Next</button>
                </fieldset>
                <fieldset>
                    <div class="form_card">
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="company">Company</label>
                                <input type="text" name="company">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="position">Position</label>
                                <input type="text" name="position">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="about">About Me</label>
                                <input type="textarea" name="about">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form_item">
                                <label for="photo">Photo</label>
                                <input type="file" name="phpto">
                            </div>
                        </div>
                    </div>
                   <button type="submit">Next</button>
                </fieldset>
            </div>
        </div>
    </form>
</div>
<div id="result_form"></div>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<?php   ?>
</body>
</html>

<?php require('partials/head.php'); ?>

<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">All members</h1>
        </div>
    </div>
    <?php if (isset($data)) : ?>
    <div class="table_wrapper wrapper">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Report subject</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $user) : ?>
                        <tr>
                            <td scope="row"><?= ++$key ?></td>
                            <td style="width: 100px">
                                <img class="user_photo"
                                     src="<?= ! empty($user['photo']) ? $user['photo'] : '/public/img/photo_idle.png' ?>"
                                     alt="user_photo">
                            </td>
                            <td style="width: 200px"><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
                            <td style="width: 1000px;"><?= $user['report_subject'] ?></td>
                            <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-12 back_to_home">
            <a href="/" id="back_to_home" class="btn btn-primary">Back to homepage</a>
        </div>
    </div>
</div>
<?php require('partials/footer.php'); ?>

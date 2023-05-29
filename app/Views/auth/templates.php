<!DOCTYPE html>
<html data-theme="light" lang="en">

<?= $this->include('layout/header') ?>

<body>
    <div class="mx-auto login-page" style="background-image: url('/asset/image/restaurant2.png');">

        <?= $this->renderSection('content') ?>
    </div>
    <?= $this->include('layout/script') ?>
</body>

</html>
<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-center align-items-center bg-dark login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 rounded p-5 bg-light">
                <h3 class="text-center">Login</h3>
                <p class="text-muted text-center">Faça login para aceder ao sistema.</p>
                <hr>

                <?= form_open('login-submit', ['novalidate' => true]) ?>

                <div class="form-group mb-3">
                    <label class="form-label" for="username">Usuário</label>
                    <input type="text" class="form-control" id="username" name="username" required value="<?= old('username') ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Palavra-passe</label>
                    <input type="password" class="form-control" id="password" name="password" required value="<?= old('password') ?>">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-secondary w-100 btn-login">Login</button>
                </div>

                <?= form_close() ?>

                <?php if (!empty($validation_errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($validation_errors as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if (!empty($login_error)):?>
                    <div class="alert alert-danger">
                        <?= $login_error?>
                    </div>
                <?php endif?>
            </div>

        </div>
    </div>

</div>
<?= $this->endSection() ?>
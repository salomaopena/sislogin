<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-center align-items-center bg-dark login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 rounded p-5 bg-light">
                <h3 class="text-center">Login</h3>
                <p class="text-muted text-center">Faça login para aceder ao sistema.</p>
                <hr>

                <?=form_open('login-submit')?>
                
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Palavra-passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-secondary w-100 btn-login">Login</button>
                    </div>
               

                <?=form_close()?>
            </div>

        </div>
    </div>

</div>
<?= $this->endSection() ?>
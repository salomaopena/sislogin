<?=$this->extend('layouts/main_layout')?>
<?=$this->section('content')?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1>Área Reservada</h1>
        </div>
        <div class="col text-end">
            <span class="me-3"><?=session()->email?></span>
            <a href="<?=base_url('logout')?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>

<?=$this->endSection()?>
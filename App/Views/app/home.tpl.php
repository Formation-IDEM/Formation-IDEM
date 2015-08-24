<?php
use Core\Helpers\String;
?>

<div class="container-fluid row">
    <div class="jumbotron">
        <h1 class="text-center">Adminstration</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="well text-center">
            <h2><i class="fa fa-users fa-2x"></i></h2>
            <p><?= $stats['trainees'] . ' ' . String::plural('étudiant', $stats['trainees']); ?></p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="well text-center">
            <h2><i class="fa fa-graduation-cap fa-2x"></i></h2>
            <p><?= $stats['formations'] . ' ' . String::plural('formation', $stats['formations']); ?></p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="well text-center">
            <h2><i class="fa fa-male fa-2x"></i></h2>
            <p><?= $stats['trainers'] . ' ' . String::plural('formateur', $stats['trainers']); ?></p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="well text-center">
            <h2><i class="fa fa-building fa-2x"></i></h2>
            <p><?= $stats['companies'] . ' ' . String::plural('entreprise', $stats['companies']); ?></p>
        </div>
    </div>
</div>
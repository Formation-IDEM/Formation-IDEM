<div class="page-header">
    <h1><?= $internship->title; ?></h1>
</div>

<div class="row">
    <div class="col-md-8">
        <h2>Présentation du stage</h2>
        <p class="text-justify">
            <?= $internship->explain; ?>
        </p>
    </div>
    <div class="col-md-4">
        <div class="well well">
            <h2>L'entreprise</h2>
            <ul>
                <li><?= $internship->getCompany()->name; ?></li>
            </ul>
        </div>
    </div>
</div>
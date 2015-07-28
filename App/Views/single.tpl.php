<h1>Entreprise : <?= $company->name; ?></h1>

<p>Liste des stages</p>

<ul>
    <?php foreach($company->getInternships() as $stage): ?>
    <li><?= $stage->title; ?></li>
    <?php endforeach; ?>
</ul>



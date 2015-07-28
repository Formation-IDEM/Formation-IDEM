<div class="page-header">
    <h1>Liste des stages</h1>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-center">Titre de stage</th>
        <th class="text-center">Entreprise</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($items as $item): ?>
    <tr>
        <td class="text-center"><?= $item->title; ?></td>
        <td class="text-center"><?= $item->company_id; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
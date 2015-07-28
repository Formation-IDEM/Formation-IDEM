<div class="jumbotron">
    <h1 class="text-center">Espace entreprise</h1>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Ville</th>
            <th class="text-center">Pays</th>
            <th class="text-center">Rajout</th>
            <th class="text-center">Stages</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $items as $item ): ?>
    <tr>
        <td class="text-center"><?= $item->id; ?></td>
        <td class="text-center"><a href="<?= url('companies/' . $item->id); ?>"><?= $item->name; ?></a></td>
        <td class="text-center"><?= $item->city; ?></td>
        <td class="text-center"><?= $item->country; ?></td>
        <td class="text-center"><?= \Core\Helpers\Date::ago($item->create_date); ?></td>
        <td>
            <ul>
                <?php
                $internships = $item->getInternships();
                if( $internships ): ?>
                <?php foreach($item->getInternships() as $stage): ?>
                <li><?= $stage->title; ?></li>
                <?php endforeach;
                else: ?>
                <p>Aucun stage</p>
                <?php endif; ?>
            </ul>
        </td>
        <td class="text-center">
            <a href="#" class="btn btn-info">Modifier</a>
            <a href="#" class="btn btn-danger">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
# Entreprises/Alexandre

Branche de travail personnel d'Alexandre pour la partie Entreprise du projet GestForm

## Utilisatation du Framework

Pour commencer à utiliser le framework il vous faut exécuter le fichier SQL/global.sql pour lancer la création des tables.

Enssuite il vous faudra modifier le fichier App/config/database.php pour renseigner vos informations de connexions à la base de donnée comme suit :

    return [
    	//	MySQL ou PostgreSQL
    	'driver'	=>	'PostgreSQL',
    
    	//	Nom de l'utilisateur
    	'db_user'	=>	'root',
    
    	//	Mot de passe de connexion
    	'db_pass'	=>	'root',
    
    	//	Nom de la base de donnée
    	'db_name'	=>	'gestForm',
    
    	//	Hôte
    	'db_host'	=>	'localhost'
    ];
    
Vous pouvez maintenant commencer à utiliser le framework ;)

## Méthodes clés du framework

### Charger un modèle

    model('nomDuModele');
    ModelFactory::loadModel('nomDuModele');
    
### Charger une collection

    collection('nomDeLaCollection');
    CollectionFactory::loadCollection('nomDeLaCollection');
    
### Charger une vue

    //  La vue doit se retrouver dans le dossier App/Views
    $data = ['test' => 'truc'];
    return view('chemin/nomfichier', $data);
    return view('chemin/nomfichier', compact('data');
    return Template::getInstance()->render('chemin/nomfichier', compact('data');
    
### Utiliser les sessions

    //  Crée une clé de session
    session()->set('key', 'value');
    Session::getInstance()->set('key', 'value');
    
    //  Récupère une clé de session
    session()->get('key');
    
    //  Détermine si une clé de session existe
    session()->has('key');
    
    //  Détruit une clé de session
    session()->void('key');
    
    //  Crée un message flash
    session()->setFlash('key', 'message');
    
    //  Récupère un message flash
    session()->getFlash(session->getFlashType());
   
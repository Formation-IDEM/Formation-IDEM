<?php  

class MatterController{
    
    public function __construct(){
    }
    
    public function indexAction(){
                
        //appel la méthode getItems de la class Collection avec la parametre qui va bien
        $collection = App::getCollection('Matter');          
 
        //On récupere le tableau d'object via la méthode pour récuperé une collection
        $coll_matters = $collection->getAllItems();
        
        //On transmet via setDatas() la collection de formation dans un tableau associatif
        Template::getInstance()->setFileName("Matter/list_matters")->setDatas(array(
            'coll_matters' => $coll_matters
        ))->render();
    
    }
    
    public function editAction(){
        
        //on charge le model de User
        $myMatter = App::getModel("Matter");
        
        if( isset($_GET['id']) ){
            
            $myMatter->load($_GET['id']);
            
        }
        
        if( isset($_POST['submit']) ) {
            //Si id existe et n'est pas vide, on modifie
            if( isset($_POST['id']) && !empty($_POST['id']) ){
                
                $myMatter->store( array(   'id'=> $_POST['id'] ));
                
            }else{//sinon c'est une création
                
                $myMatter->store( array(   'id'=> 0 ));            
                
            }
            
            $myMatter->store( array(
            
                                    'title'     => $_POST['title'],
                                    'active'    => $_POST['active']
            ));

            //on appelle la méthode qui stock les infos dans l'objet crée
            $myMatter->save();
                
            header("Location: index.php?c=Matter");
        }   
            //On transmet via setDatas() la collection de formation dans un tableau associatif
            Template::getInstance()->setFileName("Matter/edit_matters")->setDatas(array(
                'myMatter' => $myMatter
            ))->render();
        
    }

    public function deleteAction(){
        
        $myMatter = App::getModel("Matter");
        
        if( isset($_GET['id']) ){
        
            $myMatter->load($_GET['id']);
            $myMatter->delete();
            header("Location: index.php?c=Matter");
            
        }
        
    }

}
?>
<?php
namespace App\Models;

use \Core\Model;

class AdModel extends Model
{
    /**
     * Récupère les derniers articles
     *
     * @return array|mixed
     */
    public function last()
    {
        return $this->db->query("
           SELECT ads.id, ads.title, ads.content, ads.price, cats.name as cat_name
           FROM ads
           LEFT JOIN cats
            ON ads.cat_id = cats.id
           ORDER BY ads.id DESC
        ");
    }

    /**
     * Récupère les derniers articles d'une catégorie
     *
     * @param $id
     *
     * @return array|mixed
     */
    public static function getLastByCat($id)
    {
        //return self::query("SELECT * FROM articles WHERE cat_id = ?", [$id]);
        return self::query('
           SELECT ads.id, ads.title, ads.content, ads.price, cats.name as cat_title
           FROM ads
           LEFT JOIN cats
            ON ads.cat_id = cats.id
           WHERE ads.cat_id = ?
           ORDER BY ads.created_at DESC
        ', [$id]);
    }
}
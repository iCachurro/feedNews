<?php namespace App\Models;

use CodeIgniter\Model;

/**
 *
 */
class contentModel extends Model
{
    protected $table = 'content';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['publisher','title', 'img', 'body', 'url','date'];


    public function insertFromWeb($data)
    {
        foreach ($data as $key => $value) {
            $this->insert($value);
        }
    }
}



?>

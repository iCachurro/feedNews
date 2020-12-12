<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Model to manage content table
 */
class contentModel extends Model
{
    protected $table = 'content';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['publisher','title', 'img', 'body', 'url','date'];

    /*
    * Insert into content table
    * input array
    */
    public function insertFromWeb($data)
    {
        foreach ($data as $key => $value) {
            $this->insert($value);
        }
    }
}



?>

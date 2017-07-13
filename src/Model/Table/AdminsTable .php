<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AdminsTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('mobile', 'A cellNumber is required')
            ->notEmpty('name', 'A name is required')
            ->notEmpty('password', 'A password is required');
    }

}
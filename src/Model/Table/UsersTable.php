<?php

namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Event\EventInterface;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class UsersTable extends Table 
{
    public function initialize(array $config): void
    {
        $this->addbehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if(($entity->isNew()) && !($entity->slug))
        {
            $sluggedTitle = Text::slug($entity->nom);
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }


    public function validationDefault(validator $validator): Validator 
    {
        $validator
            ->notEmptyString('pseudo', 'Ce champ est vide')
            ->notEmptyString('password')
            ->minLength('password', 6);
        return $validator; 
    }
}

?>

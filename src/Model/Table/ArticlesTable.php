<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table {
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }

    public function beforeSave($event, $entity, $options){
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);

            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

    public function validationDefault(Validator $validator){
        $validator->add('title', 'required', ['rule' => 'notBlank', 'message' => 'Title cannot be blank!']);
        $validator->add('title', 'minLength', ['rule' => ['minLength', 10], 'message' => 'Title minimum length must be 10']);
        $validator->add('title', 'maxLength', ['rule' => ['maxLength', 255], 'message' => 'Title maximum length must be 255']);

        $validator->add('body', 'required', ['rule' => 'notBlank', 'message' => 'Body cannot be blank!']);
        $validator->add('body', 'minLength', ['rule' => ['minLength', 10], 'message' => 'Body minimum length must be 10']);

        return $validator;
    }
}

?>

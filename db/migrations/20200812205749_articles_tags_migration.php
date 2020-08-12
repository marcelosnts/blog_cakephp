<?php

use Phinx\Migration\AbstractMigration;

class ArticlesTagsMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('articles_tags');
        $table
            ->addColumn('article_id', 'integer')
            ->addColumn('tag_id', 'integer')
            ->addforeignKey('article_id', 'articles', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
            ->addforeignKey('tag_id', 'tags', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
            ->create();
    }
}

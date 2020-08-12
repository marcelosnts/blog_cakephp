<?php

use Phinx\Migration\AbstractMigration;

class ArticlesMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('articles');
        $table
            ->addColumn('title', 'string')
            ->addColumn('body', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('published', 'boolean', ['default' => false])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}

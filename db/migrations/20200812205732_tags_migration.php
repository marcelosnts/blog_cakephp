<?php

use Phinx\Migration\AbstractMigration;

class TagsMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('tags');
        $table
            ->addColumn('title', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}

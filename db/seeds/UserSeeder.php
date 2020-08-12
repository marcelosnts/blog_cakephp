<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            'email' => 'email@email.com',
            'password' => '123',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];

        $users = $this->table('users');
        $users->insert($data)->save();
    }
}

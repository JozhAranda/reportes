<?php

// Composer: "fzaninotto/faker": "v1.3.0"
#use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

    public function run() {
        
         
        DB::table('roles')->delete();

        
        Role::create(array(
            'title' => 'Administrador',
            'description' => 'Creara nuevos usuarios de soporte y clientes, dara de alta nuevas unidades de negocio'));
        Role::create(array(
            'title' => 'Soporte',
            'description' => 'Creara nuevos usuarios tipo clientes, tomara tickets y los solucionara'));
        Role::create(array(
            'title' => 'Cliente',
            'description' => 'Dara de alta tickets'));
        
    }

}

<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Categoria;
use App\Entity\Dispositivo;
use App\Entity\Usuario;
use App\Entity\UsuarioDispositivo;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        // $product = new Product();
        // $manager->persist($product);
        // Creating 20 job offers
        for ($i = 0; $i < 1; $i++) {
            $jobFaker = Faker\Factory::create();
            // Categoria
            $categoria = new Categoria();
            $categoria->setNombre("Ordenador");
            $manager->persist($categoria);
            // Dispositivo
            $dispositivo = new Dispositivo();
            $dispositivo->setModelo("Galaxi mini");
            $dispositivo->setMarca("Samsung");
            $dispositivo->setCoste(100.50);
            $dispositivo->setImagen("https://images-na.ssl-images-amazon.com/images/I/81fLYI1M9ML._AC_SY550_.jpg");
            $dispositivo->setCategoria($categoria);
            $manager->persist($dispositivo);
            // Usuario
            $usuario = new Usuario();
            $usuario->setUsuario("Julen");
            $usuario->setContrasena("cuatrovientos");
            $usuario->setAdmin(true);
            $manager->persist($usuario);
            // UsuarioProducto
            $usuarioDispositivo = new UsuarioDispositivo();
            $usuarioDispositivo->setDispositivo($dispositivo);
            $usuarioDispositivo->setUsuario($usuario);
            $manager->persist($usuarioDispositivo);
        }
        $manager->flush();
        }

       
    }



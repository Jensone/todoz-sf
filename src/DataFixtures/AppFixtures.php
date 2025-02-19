<?php

namespace App\DataFixtures;

use App\Entity\Network;
use Faker\Factory;
use App\Entity\Task;
use App\Entity\Todo;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use SebastianBergmann\CodeCoverage\Report\PHP;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    )
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $categories = [
            'divers',
            'courses', 
            'administratif', 
            'factures', 
            'sorties', 
            'anniversaire', 
            'urgent', 
            'ménage', 
            'déménagement',
            'business',
            'travail',
            'voyage',
            'sport',
            'santé',
            'rdv',
            'culture'
        ];

        $networks = [
            "1" => [
                "lien" => 'https://facebook.com',
                "type" => 'facebook',
            ],
            "2" => [
                "lien" => 'https://twitter.com',
                "type" => 'twitter',
            ],
            "3" => [
                "lien" => 'https://instagram.com',
                "type" => 'instagram',
            ],
            "4" => [
                "lien" => 'https://linkedin.com',
                "type" => 'linkedin',
            ],
            "5" => [
                "lien" => 'https://reddit.com',
                "type" => 'reddit',
            ],
            "6" => [
                "lien" => 'https://tiktok.com',
                "type" => 'tiktok',
            ],
            "7" => [
                "lien" => 'https://youtube.com',
                "type" => 'youtube',
            ],
        ];

        // Utilisateurs
        $users = [];
        for ($i=0; $i < 25; $i++) { 
            $username = $faker->username;
            $user = new User();
            $user->setEmail($faker->email);
            $user->setUsername($username);
            $user->setPassword($this->hasher->hashPassword($user, 'admin123'));

            $manager->persist($user);
            array_push($users, $user);

            for ($n=0; $n < 3; $n++) { 
                $selectedNetwork = $faker->randomElement($networks);
                $net = new Network();
                $net
                    ->setUrl($selectedNetwork['lien'] . '/' . $username)
                    ->setUser($user)
                    ->setType($selectedNetwork['type'])
                    ;

                $manager->persist($net);
            }

            echo $user->getUsername()."\n" . PHP_EOL;
        }

        // Création des Todos avec 5 Tasks
        for ($i = 0; $i < 30; $i++) {
            $todo = new Todo();
            $todo->setName($faker->sentence);
            $todo->setIsPublic($faker->boolean(40));
            $todo->setCategory($faker->randomElement($categories));
            $todo->setCreator($faker->randomElement($users));

            for ($j = 0; $j < 5; $j++) {
                $task = new Task();
                $task->setContent($faker->sentence);
                $task->setTimeDue($faker->dateTime);
                $todo->addTask($task);

                $manager->persist($task);

                echo "task - " . $j . PHP_EOL;

            }

            $manager->persist($todo);

            echo $todo->getName()."\n" . PHP_EOL;
        }

        $manager->flush();
    }
}

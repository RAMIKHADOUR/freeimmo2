<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Type;
use Faker\Generator;
use App\Entity\Annonces;
use App\Entity\Property;
use App\Entity\Categorys;
use App\Entity\Localisation;
use App\Entity\Installations;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
  private Generator $faker;
  public function __construct()
  {
      $this->faker = Factory::create('fr_FR');
  }
    public function load(ObjectManager $manager): void
    {

        /**
         * Annonces
         */
         $annonce = new Annonces();
          $annonce->setCode();
        $manager->persist($annonce);

        /**
         * Category
         */
        $category = new Categorys();
        $category->setCatName();
        $manager->persist($category);

          /**
           * Type
           */
          $type = new Type();
          $type->setTypeName();
          $manager->persist($type);

            /**
           * Property
           */
          $property = new Property();
          $property->setSurface()
          ->setStatus()
          ->setDescription()
          ->setPrice()
          ->setNimRooms()
          ->setNumBathrooms()
          ->setNumParkings()
          ->setNumStage()
          ->setNomeroStage()
          ->setImage()
          ->setAnnonceid()
          ->setCategoryid()
          ->setTypeid()
          ->setLocationid();
          $manager->persist($property);

          /**
           * Installation
           */

             $installation = new Installations();
             $installation-> setInternet()
                          ->setClimatisation()
                          ->setBalcon()
                          ->setGarage()
                          ->setSalleSport()
                          ->setParking()
                          ->setAnimauxAccepte()
                          ->setPiscine()
                          ->setBar()
                          ->setTelevision()
                          ->setHeater()
                          ->setCuisine()
                          ->setSecurityCam();
          $manager->persist($installation);
          /**
           * Location
           */

          $localisation = new Localisation();

          $localisation->setNomeroWay
          ->setNameWay()
          ->setTypeWay()
          ->setCity()
          ->setZipecode()
          ->setDepartement()
          ->setRegion()
          ->setMap();
          $manager->persist($installation);

        $manager->flush();
    }
}

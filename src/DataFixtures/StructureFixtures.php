<?php

namespace App\DataFixtures;

use App\Entity\Structure;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StructureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* Cherbourg */

        $fjtCherbourg = new Structure();
        $fjtCherbourg->setNom('Espace Temps');
        $fjtCherbourg->setVille('Cherbourg');
        //$fjtCherbourg->setDepartement('50');
        $fjtCherbourg->setNumeroTel('02 33 78 19 78');
        $fjtCherbourg->setAnimateur('N/A');
        $manager->persist($fjtCherbourg);

        $cllajCherbourg = new Structure();
        $cllajCherbourg->setNom('CLLAJ Cherbourg');
        $cllajCherbourg->setVille('Cherbourg');
        //$cllajCherbourg->setDepartement('50');
        $cllajCherbourg->setNumeroTel('02 33 78 19 78');
        $cllajCherbourg->setAnimateur('Manon JOLY');
        $manager->persist($cllajCherbourg);

        /* Coutances */

        $fjtCoutances = new Structure();
        $fjtCoutances->setNom('FJT Coutances');
        $fjtCoutances->setVille('Coutances');
        //$fjtCoutances->setDepartement('50');
        $fjtCoutances->setNumeroTel(' N/A');
        $fjtCoutances->setAnimateur('N/A');
        $manager->persist($fjtCoutances);

        $cllajCoutances = new Structure();
        $cllajCoutances->setNom('CLLAJ Coutances');
        $cllajCoutances->setVille('Coutances');
        //$cllajCoutances->setDepartement('50');
        $cllajCoutances->setNumeroTel(' 02.61.67.06.41');
        $cllajCoutances->setAnimateur('Manon BISBOS');
        $manager->persist($cllajCoutances);

        /* St-Lô */

        $fjtSaintLo1 = new Structure();
        $fjtSaintLo1->setNom('FJT Saint-Lô');
        $fjtSaintLo1->setVille('Saint-Lô');
        //$fjtSaintLo1->setDepartement('50');
        $fjtSaintLo1->setNumeroTel(' N/A');
        $fjtSaintLo1->setAnimateur('N/A');
        $manager->persist($fjtSaintLo1);

        $fjtSaintLo2 = new Structure();
        $fjtSaintLo2->setNom('FJT Saint-Lô');
        $fjtSaintLo2->setVille('Saint-Lô');
        //$fjtSaintLo2->setDepartement('50');
        $fjtSaintLo2->setNumeroTel(' N/A');
        $fjtSaintLo2->setAnimateur('N/A');
        $manager->persist($fjtSaintLo2);

        $cllajSaintLo = new Structure();
        $cllajSaintLo->setNom('CLLAJ Saint-Lô');
        $cllajSaintLo->setVille('Saint-Lô');
        //$cllajSaintLo->setDepartement('50');
        $cllajSaintLo->setNumeroTel(' N/A');
        $cllajSaintLo->setAnimateur('N/A');
        $manager->persist($cllajSaintLo);

        /* Avranches */

        $fjtAvranches = new Structure();
        $fjtAvranches->setNom('FJT Avranches');
        $fjtAvranches->setVille('Avranches');
        //$fjtAvranches->setDepartement('50');
        $fjtAvranches->setNumeroTel(' 06 43 75 09 04');
        $fjtAvranches->setAnimateur('Claire Magat');
        $manager->persist($fjtAvranches);

        /* Saint Hilaire */

        $cllajStHilaire = new Structure();
        $cllajStHilaire->setNom('CLLAJ Saint-Hilaire');
        $cllajStHilaire->setVille('Saint-Hilaire');
        //$cllajStHilaire->setDepartement('50');
        $cllajStHilaire->setNumeroTel('N/A');
        $cllajStHilaire->setAnimateur('N/A');
        $manager->persist($cllajStHilaire);

        /* Falaise */

        $fjtFalaise = new Structure();
        $fjtFalaise->setNom('FJT Falaise');
        $fjtFalaise->setVille('Falaise');
        //$fjtFalaise->setDepartement('14');
        $fjtFalaise->setNumeroTel('N/A');
        $fjtFalaise->setAnimateur('N/A');
        $manager->persist($fjtFalaise);

        /* Vire */

        $cllajVire = new Structure();
        $cllajVire->setNom('CLLAJ Vire');
        $cllajVire->setVille('Vire');
        //$cllajVire->setDepartement('14');
        $cllajVire->setNumeroTel('N/A');
        $cllajVire->setAnimateur('N/A');
        $manager->persist($cllajVire);

        /* Hérouville */

        $fjtHerouville = new Structure();
        $fjtHerouville->setNom('FJT Hérouville');
        $fjtHerouville->setVille('Hérouville');
        //$fjtHerouville->setDepartement('14');
        $fjtHerouville->setNumeroTel('N/A');
        $fjtHerouville->setAnimateur('N/A');
        $manager->persist($fjtHerouville);

        /* Caen */

        $fjtCaen = new Structure();
        $fjtCaen->setNom('FJT Caen');
        $fjtCaen->setVille('Caen');
        //$fjtCaen->setDepartement('14');
        $fjtCaen->setNumeroTel('N/A');
        $fjtCaen->setAnimateur('N/A');
        $manager->persist($fjtCaen);

        /* Flers */

        $fjtFlers = new Structure();
        $fjtFlers->setNom('FJT Flers');
        $fjtFlers->setVille('Flers');
        //$fjtFlers->setDepartement('61');
        $fjtFlers->setNumeroTel('N/A');
        $fjtFlers->setAnimateur('N/A');
        $manager->persist($fjtFlers);

        /* La Ferté-Macé */

        $fjtFerte = new Structure();
        $fjtFerte->setNom('FJT La Ferté-Macé');
        $fjtFerte->setVille('La Ferté-Macé');
        //$fjtFerte->setDepartement('61');
        $fjtFerte->setNumeroTel('N/A');
        $fjtFerte->setAnimateur('N/A');
        $manager->persist($fjtFerte);

        /* Argentan */

        $fjtArgentan = new Structure();
        $fjtArgentan->setNom('FJT La Argentan');
        $fjtArgentan->setVille('La Argentan');
        //$fjtArgentan->setDepartement('61');
        $fjtArgentan->setNumeroTel('N/A');
        $fjtArgentan->setAnimateur('N/A');
        $manager->persist($fjtArgentan);

        $cllajArgentan = new Structure();
        $cllajArgentan->setNom('CLLAJ La Argentan');
        $cllajArgentan->setVille('La Argentan');
       // $cllajArgentan->setDepartement('61');
        $cllajArgentan->setNumeroTel('N/A');
        $cllajArgentan->setAnimateur('N/A');
        $manager->persist($cllajArgentan);

        /* Alençon */

        $fjtAlencon = new Structure();
        $fjtAlencon->setNom('FJT Alençon');
        $fjtAlencon->setVille('Alençon');
        //$fjtAlencon->setDepartement('61');
        $fjtAlencon->setNumeroTel('N/A');
        $fjtAlencon->setAnimateur('N/A');
        $manager->persist($fjtAlencon);

        /* Montagne-au-Perche */

        $fjtPerche = new Structure();
        $fjtPerche->setNom('FJT Montagne-au-Perche');
        $fjtPerche->setVille('Montagne-au-Perche');
        //$fjtPerche->setDepartement('61');
        $fjtPerche->setNumeroTel('N/A');
        $fjtPerche->setAnimateur('N/A');
        $manager->persist($fjtPerche);

        /* Evreux */

        $fjtEvreux = new Structure();
        $fjtEvreux->setNom('FJT Evreux');
        $fjtEvreux->setVille('Evreux');
        //$fjtEvreux->setDepartement('27');
        $fjtEvreux->setNumeroTel('N/A');
        $fjtEvreux->setAnimateur('N/A');
        $manager->persist($fjtEvreux);

        $cllajEvreux = new Structure();
        $cllajEvreux->setNom('CLLAJ Evreux');
        $cllajEvreux->setVille('Evreux');
        //$cllajEvreux->setDepartement('27');
        $cllajEvreux->setNumeroTel('N/A');
        $cllajEvreux->setAnimateur('N/A');
        $manager->persist($cllajEvreux);

        /* Louviers */

        $fjtLouviers = new Structure();
        $fjtLouviers->setNom('FJT Louviers');
        $fjtLouviers->setVille('Louviers');
        //$fjtLouviers->setDepartement('27');
        $fjtLouviers->setNumeroTel('N/A');
        $fjtLouviers->setAnimateur('N/A');
        $manager->persist($fjtLouviers);

        $cllajLouviers = new Structure();
        $cllajLouviers->setNom('CLLAJ Louviers');
        $cllajLouviers->setVille('Louviers');
        //$cllajLouviers->setDepartement('27');
        $cllajLouviers->setNumeroTel('N/A');
        $cllajLouviers->setAnimateur('N/A');
        $manager->persist($cllajLouviers);

        /* Vernon */

        $fjtVernon = new Structure();
        $fjtVernon->setNom('FJT Vernon');
        $fjtVernon->setVille('Vernon');
        //$fjtVernon->setDepartement('27');
        $fjtVernon->setNumeroTel('N/A');
        $fjtVernon->setAnimateur('N/A');
        $manager->persist($fjtVernon);

        $cllajVernon = new Structure();
        $cllajVernon->setNom('CLLAJ Vernon');
        $cllajVernon->setVille('Vernon');
        //$cllajVernon->setDepartement('27');
        $cllajVernon->setNumeroTel('N/A');
        $cllajVernon->setAnimateur('N/A');
        $manager->persist($cllajVernon);

        /* Rouen */

        $fjtRouen = new Structure();
        $fjtRouen->setNom('FJT Rouen');
        $fjtRouen->setVille('Rouen');
        // $fjtRouen->setDepartement('76');
        $fjtRouen->setNumeroTel('N/A');
        $fjtRouen->setAnimateur('N/A');
        $manager->persist($fjtRouen);

        /* Le Havre */

        $cllajHavre = new Structure();
        $cllajHavre->setNom('CLLAJ Le Havre');
        $cllajHavre->setVille('Le Havre');
        // $cllajHavre->setDepartement('76');
        $cllajHavre->setNumeroTel('N/A');
        $cllajHavre->setAnimateur('N/A');
        $manager->persist($cllajHavre);

        $manager->flush();
    }
}

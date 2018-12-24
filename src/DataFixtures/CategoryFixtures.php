<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category
            ->setName('category')
        ;
        $this->addReference('category', $category);
        $manager->persist($category);

        $manager->flush();
    }
}

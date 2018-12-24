<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $tag = new Tag();
        $tag->setName($tag);
        $this->addReference('tag', $tag);
        $manager->persist($tag);

        $manager->flush();
    }
}

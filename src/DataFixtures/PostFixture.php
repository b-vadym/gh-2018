<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $product = new Post($this->getReference('user'));
        $product
             ->setBody('body')
             ->setTitle('title')
             ->addTag($this->getReference('tag'))
             ->setCategory($this->getReference('category'))
         ;
        $manager->persist($product);

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies(): array
    {
        return [UserFixture::class, CategoryFixtures::class, TagFixtures::class];
    }
}

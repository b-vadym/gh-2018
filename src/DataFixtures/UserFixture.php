<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user
            ->setEmail('user@example.com')
        ;

        $user->setPassword($this->passwordEncoder->encodePassword($user, '123'));
        $manager->persist($user);
        $this->setReference('user', $user);

        $deactivatedUser = new User();
        $deactivatedUser
            ->setEmail('user-deactiveted@example.com')
            ->setIsActive(false)
        ;
        $deactivatedUser->setPassword($this->passwordEncoder->encodePassword($user, '123'));
        $manager->persist($user);

        $manager->flush();
    }
}

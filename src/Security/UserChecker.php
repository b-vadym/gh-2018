<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserChecker as BaseUserChecker;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker extends BaseUserChecker
{
    /**
     * {@inheritdoc}
     */
    public function checkPreAuth(UserInterface $user): void
    {
        parent::checkPreAuth($user);

        if (!$user instanceof User) {
            return;
        }

        if (!$user->isActive()) {
            throw new CustomUserMessageAuthenticationException(
                'Your account was deactivated. Sorry about that!'
            );
        }
    }
}

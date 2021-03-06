<?php

declare(strict_types=1);

namespace CodelyTv\Controller;

use CodelyTv\Model\Newsletter;
use InvalidArgumentException;

final class NewsletterController
{
    public function post(string $emailAddress): Newsletter
    {
        if ('' === $emailAddress) {
            throw new InvalidArgumentException('The email address is empty');
        }

        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("The email address <$emailAddress> is not valid");
        }

        if (!(strpos($emailAddress, '@yahoo') || strpos($emailAddress, '@gmail') || strpos($emailAddress, '@outlook'))) {
            throw new InvalidArgumentException("The email address <$emailAddress> has not a common provider");
        }

        return new Newsletter($emailAddress);
    }
}

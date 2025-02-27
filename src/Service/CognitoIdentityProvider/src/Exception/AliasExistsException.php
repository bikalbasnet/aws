<?php

namespace AsyncAws\CognitoIdentityProvider\Exception;

use AsyncAws\Core\Exception\Http\ClientException;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * This exception is thrown when a user tries to confirm the account with an email address or phone number that has
 * already been supplied as an alias for a different user profile. This exception indicates that an account with this
 * email address or phone already exists in a user pool that you've configured to use email address or phone number as a
 * sign-in alias.
 */
final class AliasExistsException extends ClientException
{
    protected function populateResult(ResponseInterface $response): void
    {
        $data = $response->toArray(false);

        if (null !== $v = (isset($data['message']) ? (string) $data['message'] : null)) {
            $this->message = $v;
        }
    }
}

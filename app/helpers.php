<?php

declare(strict_types=1);

function localized_route($name, array $parameters = [], ?string $locale = null, bool $absolute = true): string
{
    $parameters['locale'] = $locale ?? app()->getLocale();

    return route($name, $parameters, $absolute);
}

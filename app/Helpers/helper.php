<?php

namespace App\Helpers;

function formatTags(array $tags): string
{
    return implode(',', $tags);
}

<?php

namespace Aerni\SocialLinks\Tests;

use Aerni\SocialLinks\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}

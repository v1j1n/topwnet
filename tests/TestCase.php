<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Safety check: Ensure tests never run against production databases
        $this->ensureTestingEnvironment();
    }

    /**
     * Ensure tests are running in a safe testing environment.
     */
    protected function ensureTestingEnvironment(): void
    {
        // Verify we're in testing environment
        if (config('app.env') !== 'testing') {
            throw new \RuntimeException(
                'Tests must be run in testing environment. '.
                'Current environment: '.config('app.env')
            );
        }

        // Verify we're using SQLite for database
        $connection = config('database.default');
        if ($connection !== 'sqlite') {
            throw new \RuntimeException(
                'Tests must use SQLite database for safety. '.
                "Current connection: {$connection}. ".
                'Please check your phpunit.xml and .env.testing files.'
            );
        }

        // Verify we're using in-memory database
        $database = config('database.connections.sqlite.database');
        if ($database !== ':memory:') {
            throw new \RuntimeException(
                'Tests must use in-memory SQLite database (:memory:). '.
                "Current database: {$database}"
            );
        }
    }
}

<?php

namespace Mascarade\Foundations\Core\Cli;

abstract class Migration
{
    /**
     * Execute the "up" method of the migration.
     */
    abstract public function up();

    /**
     * Roll back the migration by executing the "down" method.
     */
    abstract public function down();
}

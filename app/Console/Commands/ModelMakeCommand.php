<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('Data/Models'))
            ? $rootNamespace.'\\Data\\Models'
            : $rootNamespace;
    }
}

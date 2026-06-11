<?php

namespace Tassili\Admin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Tassili\Admin\Utils\FormPart  ;

class CreateForm extends Command
{
    protected $signature = 'make:form';

    protected $description = 'Create tassili form';

    public function handle()
    {
       
        // 1. Panel
        $panel = 'admin';

         // 2. Modèle CRUD parent (namespace)
        if (!empty($modelList)) {
            $crudModel = $this->choice('Model CRUD parent (namespace) ?', $modelList);
        } else {
            $crudModel = $this->ask('Model CRUD parent (namespace) ?');
        }

        // 3. Nom de la collection
        $formName = $this->ask('Collection Name? (ex: ArticleCreator)');
        if (empty($formName)) {
            $this->error('this field is required.');
            return self::FAILURE;
        }

        // 4. Modèle de la collection
        if (!empty($modelList)) {
            $model = $this->choice('Collection Model ?', $modelList);
        } else {
            $model = $this->ask('Collection Model ? (ex: Article)');
        }

        $formName = $formName . 'Form' ;
        $panelCamel  = Str::ucfirst($panel);

        $formPart = new FormPart() ;
        $morceau =  $formPart->getForm($panel,$panelCamel,$formName,$crudModel,$model);

        $relativePath = "Http/Controllers/Tassili/{$panelCamel}/Crud/{$crudModel}/Forms/{$formName}.php";
        $fullPath      = app_path($relativePath);

        if (File::exists($fullPath)) {
            $this->error("This File already exist : app/{$relativePath}");
            return self::FAILURE;
        }

        File::ensureDirectoryExists(dirname($fullPath));
        File::put($fullPath, $morceau);

        $this->info('');
        $this->line('  <fg=cyan>Tassili — Form created with success!</>');
        $this->info('');
    }
}
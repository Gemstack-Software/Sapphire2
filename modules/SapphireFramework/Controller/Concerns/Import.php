<?php
    namespace Sapphire\Controller\Concerns;
    use Helpers\Support\Str;
    use Helpers\Files\File;

    trait Import 
    {
        public static function Import(string $controllerPath = '')
        {
            if($controllerPath === '')
            {
                return;
            }

            //////////////////////////////////////
            // Getting controller path
            //////////////////////////////////////
            $controllerPathString = new Str($controllerPath);
            $last = $controllerPathString->SplitToArray('.')->Last();

            $controllerPathString->ReplaceLeaving('.', '/');
            $controllerPathString->Add("/$last"."Controller.php");

            //////////////////////////////////////
            // Getting controller file
            //////////////////////////////////////
            $file = new File(BASE_DIR . '/' . $controllerPathString->Get());
            $controller = $file->Includes();

            return $controller;
        }   
    }
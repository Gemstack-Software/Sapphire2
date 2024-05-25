<?php
    namespace Sapphire\Application\Concerns;

    use Sapphire\Request;
    use Helpers\Support\Str;

    trait SelectRoute
    {
        public function SelectRoute(): void
        {
            $request = Request::Current();
            $isApi = $request->IsApiURL();

            if($isApi)
            {
                $this->apiRouter->HandleCurrentRoute();
            }
            else
            {
                /**
                 * Minify content
                 */
                ob_start(function (string $content) {
                    $strContent = new Str($content);
                    $strContent->MinifyLeaving(true);

                    return $strContent->Get();
                });

                $this->standardRouter->HandleCurrentRoute();
            }
        }        
    }
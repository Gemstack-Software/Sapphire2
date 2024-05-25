<?php
    namespace Sapphire\Router\Concerns;
    use Sapphire\Request;
    use Sapphire\Response;
    use Sapphire\Renderer;
    use Helpers\Files\File;
    use Helpers\Formats\JSON;

    trait Route 
    {
        /**
         * This handles current request
         */
        public function HandleCurrentRoute(): void
        {
            $request = Request::Current();      // Current request
            $parts = $request->GetURLParts();   // Current request url parts
            $list = $this->GetList();           // Route list

            /**
             * Setting default component to element in list called ('/')  or null
             */
            $component = $list['/'] ?? null;

            /**
             * Recursive looking for component in list of routes, that matches current url parts
             */
            foreach ($parts as $part) 
            {
                if($part === '') continue;

                /**
                 * It is not component path but array with routes (Group)
                 */
                if($component and is_array($component))
                {
                    if(@$component[$part])
                    {
                        $component = @$component[$part];
                    }
                    else
                    {
                        $component = null;
                        break;
                    }
                }
                /**
                 * Root of routes list
                 */
                else 
                {
                    if(@$list[$part])
                    {
                        $component = @$list[$part];
                    }
                    else
                    {
                        $component = null;
                        break;
                    }
                }
                
            }

            if($component)
            {
                /**
                 * Component at this url exists
                 */
                if(is_array($component) && @$component["/"])
                {
                    /**
                     * If current path matches to group of routes components. Then select this component with '/' url at this group.
                     */
                    $component = $component["/"];
                }
                else if(is_array($component))
                {
                    /**
                     * Component does not exists
                     */
                    Response::HTML('404');
                }

                /**
                 * Rendering current component
                 */
                if($this->prefix === '/api') 
                {
                    $this->RenderAPI($component);
                }
                else
                {
                    Renderer::RenderWithLayout (
                        $component,
                        params: [
                            '__fromRouter' => true
                        ]
                    );
                }
            }
            else
            {
                /**
                 * Component does not exists
                 */
                Response::HTML('404');
            }
        }

        public function RenderAPI(array|string $controller): void
        {
            /////////////////////////////////////////////////////////////////////
            // Response
            /////////////////////////////////////////////////////////////////////
            if($controller === false) return;

            if(gettype($controller) === "string")
            {
                /**
                 * API BY COMPONENT
                 */
                Response::SetHeader('Content-Type', 'application/json');
   
                Renderer::Render (
                    $controller,
                    params: [
                        '__fromRouter' => true,
                        '__withoutTemplate' => true
                    ]
                );

                exit();
            }
            else
            {
                /**
                 * API BY CONTROLLER
                 */
                [$controllerPath, $controllerMethod] = $controller;
            
                $controllerFile = new File(BASE_DIR . '/' . $controllerPath);
                $controller = $controllerFile->Includes();

                if(method_exists($controller, $controllerMethod)) 
                {
                    $response = $controller->{$controllerMethod}();

                    /**
                     * Setting content type
                     */
                    Response::SetHeader('Content-Type', 'application/json');

                    /**
                     * Echoing the response
                     */
                    echo JSON::ObjectToString($response);

                    /**
                     * Exitting application
                     */
                    exit();
                }
            }
        }
    }
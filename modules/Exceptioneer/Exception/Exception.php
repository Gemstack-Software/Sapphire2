<?php
    namespace Exceptionner;
    use \Exception as PHP_Exception;
    use \Throwable as PHP_Throwable;
    use Sapphire\Renderer;

    class Exception extends PHP_Exception implements PHP_Throwable
    {
        public function __construct($message, $code = 0, Throwable $previous = null) {
            $exceptions = SAPPHIRE_ROUTER_EXCEPTIONS;
            $controller = ($exceptions[$message] ?? $exceptions['*']) ?? '';

            if($controller === '')
            {
                echo $message;
            }
            else
            {
                Renderer::Render (
                    $controller,
                    params: [
                        '__fromException' => true,
                        '__message' => $message
                    ]
                );  
            }
            

            //////////////////////////////
            // At this point we can end
            //////////////////////////////
            exit();

            //////////////////////////////
            // If somehow its needed?
            //////////////////////////////
            parent::__construct($message, $code, $previous);
        }

        public function __toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        }
    }
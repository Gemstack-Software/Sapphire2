<?php
    use Sapphire\Component;
    use Sapphire\Response;
    use Sapphire\Request;

    class Render extends Component 
    {
        public function Setup()
        {
            $this->Store('componentPath', Request::Current()->GetContent()->path);
            $this->Store('params', Request::Current()->GetContent()->props->params);
        }

        public function View()
        {
            Response::SetHeader('Content-Type', 'text/html');
            return $this->Template('Render.view.php');
        }
    }

    return new Render; 
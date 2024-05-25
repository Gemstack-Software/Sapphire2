<?php
    use Sapphire\Component;
    use Sapphire\Response;
    use Helpers\Files\File;
    use Helpers\Files\Storage;

    class Adapter extends Component 
    {
        public function Setup()
        {
            $this->Store('script', new File('client/SapphireAdapter.js', new Storage('~sapphire')));
        }

        public function View()
        {
            Response::SetHeader('Content-Type', $this->Store('script')->Mime());
            return $this->Template('Adapter.view.php');
        }
    }

    return new Adapter; 
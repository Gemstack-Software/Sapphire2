<?php
    use Sapphire\Controller;
    use Sapphire\Model;
    use Sapphire\Response;

    return new class extends Controller 
    {
        public function Index()
        {
            $number = static::Composable('Randomizer');

            return [
                [
                    'title' => "About random numbers",
                    'content' => "About random numbers. $number is a random number"
                ]
            ];
        }
    };
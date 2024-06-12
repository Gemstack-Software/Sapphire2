<?php
    namespace Sapphire;

    return new class extends Controller 
    {
        public function Index()
        {
            $news = Composable::Composable('GetNews');

            return $news;
        }
    };
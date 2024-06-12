<?php
    namespace AquaCSS\Concerns;

    trait Metrics
    {
        // px(...)
        public static function Pixels($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 3, strlen($match) - 4);

                return $inside . "px";
            }
        }

        // vw(...)
        public static function ViewportWidth($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 3, strlen($match) - 4);

                return $inside . "vw";
            }
        }

        // vh(...)
        public static function ViewportHeight($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 3, strlen($match) - 4);

                return $inside . "vh";
            }
        }

        // rem(...)
        public static function REM($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 4, strlen($match) - 5);

                return $inside . "rem";
            }
        }

        // em(...)
        public static function EM($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 3, strlen($match) - 4);

                return $inside . "em";
            }
        }

        // per(...)
        public static function Percentage($matches)
        {
            foreach($matches as $match)
            {
                $inside = substr($match, 4, strlen($match) - 5);

                return $inside . "%";
            }
        }
    }
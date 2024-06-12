<?php
    use Quartz\Model;

    return function(): array
    {
        $news = Model::Import('src.models.Post')->All();

        return $news;
    };
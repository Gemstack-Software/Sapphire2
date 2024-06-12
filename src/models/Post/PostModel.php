<?php   
    use Quartz\Model;

    return new class extends Model
    {
        /**
         * Setting up name of table we use.
         */
        protected string $tableName = "newses";

        
    };
<?php
    use Sapphire\Controller;
    use Sapphire\Model;

    class User extends Controller 
    {
        public function Index()
        {
            $user = Model::Get("src.models.User.User");

            return Response::Json ([
                'users' => $user->All()
            ]);
        }
    }
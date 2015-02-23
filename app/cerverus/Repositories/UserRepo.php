<?php

namespace credits\Repositories;

use credits\Entities\User;

class UserRepo extends BaseRepo
{

    protected function getModel()
    {
        return new User();
    }

}
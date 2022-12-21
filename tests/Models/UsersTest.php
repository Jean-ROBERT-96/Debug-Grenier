<?php

namespace App\Models;

use App\Utility\Hash;

use PHPUnit\Framework\TestCase;
use App\Models\Users;


class UsersTest extends TestCase  {

    
    /** @test */
    public function getByLogin()
    {
        $login = "henry.tourraine@outlook.fr";
        $result = User::getByLogin($login);
        $keys = array_keys($result);
        $this-> assertSame(["id", "username", "email", "password", "salt", "is_admin"], $keys);
    }

    /** @test */
    public function resetPassword(){
        $login = "henry.tourraine@outlook.fr";
        $result = User::getByLogin($login);

        User::resetPassword($login);

        $result2 = User::getByLogin($login);

        //fwrite(STDOUT, print_r( $result["password"]." ".$result2["password"], TRUE));
        $this->assertNotSame($result["password"], $result2["password"]);
        $this->assertSame(0, 0);
    }


}


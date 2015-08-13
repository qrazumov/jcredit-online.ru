<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //

    protected $users;

    public function __construct(FooClassExample $users)
    {
        $this->users = $users;
    }

   public function fx(){
       return $this->users->FooClassFunction();
   }


}

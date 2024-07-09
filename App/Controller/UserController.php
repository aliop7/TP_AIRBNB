<?php 

namespace App\Controller;

use Core\Controller\Controller;
use Core\View\View;

class UserController extends Controller 
{
  public function account(): void
  {
    $view = new View('user/account');
    $view->render();
  }
}
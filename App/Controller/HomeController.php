<?php 

namespace App\Controller;

use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller 
{
  public function home(): void
  {
    $view = new View('home/index');
    $view->render();
  }

  public function result(): void
  {
    $view = new View('home/result');
    $view->render();
  }

  public function room(): void
  {
    $view = new View('home/room');
    $view->render();
  }
}
<?php

namespace App;

use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\PropertyController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;
use Core\Database\DatabaseConfigInterface;
use Core\View\View;
use MiladRahimi\PhpRouter\Router;

class App implements DatabaseConfigInterface
{
  private static ?self $instance = null;

  public static function getApp(): self
  {
    return self::$instance ??= new self();
  }

  private Router $router;

  public function getRouter(): Router
  {
    return $this->router;
  }

  private function __construct()
  {
    $this->router = Router::create();
  }

  public function start(): void
  {
    session_start();

    $this->registerRoutes();
    $this->startRouter();
  }

  private function registerRoutes(): void
  {
    $router = $this->router;

    // TEST
    $this->router->get('/test', function () {
      return (new View('test/index'))->render();
    });

    // GLOBAL
    $this->router->get('/', [HomeController::class, 'home'] );
    $this->router->get('/result', [HomeController::class, 'result'] );
    $this->router->get('/room', [HomeController::class, 'room'] );

    // AUTH
    $this->router->post('/register', [AuthController::class, 'register']);
    $this->router->post('/exist', [AuthController::class, 'exist']);

    // USER
    $router->group(['middleware' => [AuthMiddleware::class]], function(Router $router) {
      $router->get('/account', [UserController::class, 'account']);
      $this->router->get('/logout', [AuthController::class, 'logout']);
    });

    // PROPERTY
    $router->get('/property/{id}', [PropertyController::class, 'propertyDetail']);
    $router->post('/property/insert', [PropertyController::class, 'insertProperty']);
    
    $router->post('/property/delete', [PropertyController::class, 'deleteProperty']);
  }

  private function startRouter(): void
  {
    /*try {
      $this->router->dispatch();
    } catch (RouteNotFoundException $error) {
      $this->router->getPublisher()->publish(new HtmlResponse('Not found.', 404));
    } catch (Throwable $error) {
      $this->router->getPublisher()->publish(new HtmlResponse('Internal error.', 500));
    }*/

    $this->router->dispatch();
  }

  public function getHost(): string
  {
    return DB_HOST;
  }

  public function getName(): string
  {
    return DB_NAME;
  }

  public function getUser(): string
  {
    return DB_USER;
  }

  public function getPass(): string
  {
    return DB_PASS;
  }
}

<?php 

namespace App\Controller;

use App\AppRepoManager;
use App\Model\User;
use Core\View\View;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Controller\Controller;
use Core\Form\FormError;
use Laminas\Diactoros\ServerRequest;

class AuthController extends Controller 
{
  public function loginForm(): void
  {
    $view = new View('auth/login');
    $view->render();
  }

  public function registerForm():  void
  {
    $view = new View('auth/register');
    $view->render();
  }

  public function exist(ServerRequest $request): string
  {
    $data_form = $request->getParsedBody();

    return json_encode(['exist' => $this->userExist($data_form['email'])]);
  }

  public function register(ServerRequest $request): string
  {
    $data_form = $request->getParsedBody();

    $form_result = new FormResult();

    $user = new User();

    if (
      empty($data_form['email']) ||
      empty($data_form['password']) ||
      empty($data_form['lastname']) ||
      empty($data_form['firstname'])
    ) 
    {
      $form_result->addError(new FormError('Veuillez remplir tous les champs'));
    } 
    elseif (!$this->validEmail($data_form['email'])) 
    {
      $form_result->addError(new FormError('L\'email n\'est pas valide'));
    } 
    elseif ($this->userExist($data_form['email'])) 
    {
      $form_result->addError(new FormError('Cet utilisateur existe déjà'));
    } 
    else {
      $data_user = [
        'email' => strtolower($this->validInput($data_form['email'])),
        'password' => password_hash($this->validInput($data_form['password']), PASSWORD_BCRYPT),
        'lastname' => $this->validInput($data_form['lastname']),
        'firstname' => $this->validInput($data_form['firstname']),
        'phone' => '0695747587',
        'address_id' => 1
      ];

      $user = AppRepoManager::getRm()->getUserRepository()->addUser($data_user);
    }
    
    if ($form_result->hasErrors()) 
    {
      $errors = $form_result->getErrors();

      $errorMessages = array_map(function($error) {
          return $error->getMessage();
      }, $errors);
      
      return json_encode(['errors' => $errorMessages]);
    }

    $user->password = '';
    
    Session::set(Session::USER, $user);
    
    return json_encode(['success' => true]);
  }

  public function login(ServerRequest $request)
  {
    $data_form = $request->getParsedBody();

    $form_result = new FormResult();

    $user = new User();

    if (empty($data_form['email']) || empty($data_form['password']))
    {
      $form_result->addError(new FormError('Veuillez remplir tous les champs'));
    } 
    else
    {
      $user = AppRepoManager::getRm()->getUserRepository()->findUserByEmail($data_form['email']);

      if (is_null($user) || !password_verify($this->validInput($data_form['password']), $user->password)) $form_result->addError(new FormError('Email ou mot de passe incorrect'));
    }
  
    if ($form_result->hasErrors()) {
      $errors = $form_result->getErrors();

      $errorMessages = array_map(function($error) {
          return $error->getMessage();
      }, $errors);
      
      return json_encode(['errors' => $errorMessages]);
    }

    $user->password = '';
    
    Session::set(Session::USER, $user);
    
    return json_encode(['success' => true]);
  }

  public function validEmail(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public function validPassword(string $password): bool
  {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password);
  }

  public function userExist(string $email): bool
  {
    $user = AppRepoManager::getRm()->getUserRepository()->findUserByEmail($email);
    return !is_null($user);
  }

  public function validInput(string $data): string
  {
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  public static function isAuth(): bool
  {
    return !is_null(Session::get(Session::USER));
  }

  public function logout(): void
  {
    Session::remove(Session::USER);
    
    self::redirect('/');
  }
}
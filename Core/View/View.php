<?php

namespace Core\View;

use App\Controller\AuthController;

class View
{
  public const PATH_VIEW = PATH_ROOT . 'views' . DS;

  public const PATH_PARTIALS = self::PATH_VIEW . '_templates' . DS;

  public string $title = 'AIRBNB';

  protected string $basePath;

  public function __construct(private string $name, private bool $is_complete = true)
  {
    $this->basePath = "../";
  }

  //méthode pour récupérer le chemin de la vue
  // 'home/home'
  private function getRequirePath(): string
  {
    //on va explode le nom de la vue pour récupérer le dossier et le fichier
    $arr_name = explode('/', $this->name);
    //on récupère le premier élément
    $category = $arr_name[0];
    //on récupère le second élément
    $name = $arr_name[1];
    //si je crée un template on ajoutera un _ devant le nom du fichier
    $name_prefix = $this->is_complete ? '' : '_';
    //reste plus qu'a retourné le chemin complet
    return self::PATH_VIEW . $category . DS . $name_prefix . $name . '.html.php';
  }

  public function render(?array $view_data = [])
  {
    $auth = AuthController::class;

    if (!empty($view_data)) extract($view_data);

    ob_start();

    if ($this->is_complete) require self::PATH_PARTIALS . '_header.html.php';

    require_once $this->getRequirePath();

    if ($this->is_complete) require self::PATH_PARTIALS . '_footer.html.php';

    ob_end_flush();
  }
}

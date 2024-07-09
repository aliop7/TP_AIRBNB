<?php

namespace App\Controller;

use App\AppRepoManager;
use Core\Controller\Controller;
use Core\View\View;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;

class PropertyController extends Controller
{
  public function home(): void
  {
    $view = new View('property/detail');
    $view->render();
  }

  public function propertyDetail(int $id): void
  {
    $view_data = [
      'property' => AppRepoManager::getRm()->getPropertyRepository()->getProperty($id)
    ];

    $view = new View('property/detail');
    $view->render($view_data);
  }

  public function deleteProperty(ServerRequest $request): RedirectResponse
  {
    AppRepoManager::getRm()->getPropertyRepository()->deleteProperty($request->getParsedBody()['property_id']);

    return new RedirectResponse('/account');
  }

  public function insertProperty(ServerRequest $request): RedirectResponse
  {
    $address = AppRepoManager::getRm()->getAddressRepository()->insertAddress($request->getParsedBody());

    AppRepoManager::getRm()->getPropertyRepository()->insertProperty(array_merge($request->getParsedBody(), [ 'address_id' => $address->id ]));

    return new RedirectResponse('/account');
  }
}
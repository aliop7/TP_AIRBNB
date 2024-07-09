<?php use Core\Session\Session; ?>

<?php
use App\AppRepoManager;

$user = Session::get(Session::USER);
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Mon compte</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($user->email); ?></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><?php echo htmlspecialchars($user->lastname); ?></td>
                </tr>
                <tr>
                    <th>Prénom</th>
                    <td><?php echo htmlspecialchars($user->firstname); ?></td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td><?php echo htmlspecialchars($user->phone); ?></td>
                </tr>
                <tr>
                    <th>Adresse ID</th>
                    <td><?php echo htmlspecialchars($user->address_id); ?></td>
                </tr>
            </table>

            <table class="table table-bordered">
              <?php foreach (AppRepoManager::getRm()->getPropertyRepository()->getPropertyByuser($user->id) as $propertyIndex => $property) : ?>

                  <tr>
                      <th><?= $propertyIndex ?></th>
                      <td>
                          <div class="property-detail">


                              <form method="post" action="/property/delete">
                                  <input type="hidden" name="property_id" value="<?= $property->id; ?>">
                                  <button type="submit" class="delete-button">Delete</button>
                              </form>

                              <div class="field">
                                  <label for="id">ID:</label>
                                  <span id="id"><?= $property->id; ?></span>
                              </div>

                              <div class="field">
                                  <label for="title">Title:</label>
                                  <span id="title"><?= $property->title; ?></span>
                              </div>

                              <div class="field">
                                  <label for="description">Description:</label>
                                  <span id="description"><?= $property->description; ?></span>
                              </div>

                              <div class="field">
                                  <label for="pricePerNight">Price Per Night:</label>
                                  <span id="pricePerNight"><?= $property->pricePerNight; ?> $</span>
                              </div>

                              <div class="field">
                                  <label for="rooms">Rooms:</label>
                                  <span id="rooms"><?= $property->rooms; ?></span>
                              </div>

                              <div class="field">
                                  <label for="beds">Beds:</label>
                                  <span id="beds"><?= $property->beds; ?></span>
                              </div>

                              <div class="field">
                                  <label for="baths">Baths:</label>
                                  <span id="baths"><?= $property->baths; ?></span>
                              </div>

                              <div class="field">
                                  <label for="maxGuests">Max Guests:</label>
                                  <span id="maxGuests"><?= $property->maxGuests; ?></span>
                              </div>

                              <div class="field">
                                  <label for="isActive">Active:</label>
                                  <span id="isActive"><?= $property->isActive ? 'Yes' : 'No'; ?></span>
                              </div>

                              <div class="field">
                                  <label for="propertyTypeId">Property Type ID:</label>
                                  <span id="propertyTypeId"><?= $property->propertyTypeId; ?></span>
                              </div>

                              <div class="field">
                                  <label for="userId">User ID:</label>
                                  <span id="userId"><?= $property->userId; ?></span>
                              </div>

                              <div class="field">
                                  <label for="addressId">Address ID:</label>
                                  <span id="addressId"><?= $property->addressId; ?></span>
                              </div>

                              <div class="field">
                                  <label for="type">Property Type:</label>
                                  <span id="type"><?= isset($property->type) ? $property->type->label : 'Not Set'; ?></span>
                              </div>

                              <div class="field">
                                  <label for="user">User:</label>
                                  <span id="user"><?= isset($property->user) ? $property->user->name : 'Not Set'; ?></span>
                              </div>

                              <div class="field">
                                  <label for="address">Address:</label>
                                  <span id="address"><?= isset($property->address) ? $property->address->address : 'Not Set'; ?></span>
                              </div>

                              <div class="field">
                                  <label for="images">Images:</label>
                                  <span id="images">
                                <?php if (!empty($property->images)): ?>
                                    <ul>
                                        <?php foreach ($property->images as $image): ?>
                                            <li><img src="assets/images/<?= $image->image_path; ?>" alt="Property Image" style="max-width: 100px;"></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    No images available.
                                <?php endif; ?>
                            </span>
                              </div>
                          </div>
                      </td>
                  </tr>
              <?php endforeach; ?>
            </table>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Ajouter une propriété
                            </div>
                            <div class="card-body">
                                <form action="/property/insert" method="post">

                                    <div class="form-group">
                                        <label for="property_type_id" class="form-label">Property Type</label>
                                        <select id="property_type_id" name="property_type_id" class="form-select" aria-label="Default select example" required>
                                          <?php foreach (AppRepoManager::getRm()->getPropertyTypeRepository()->getAllPropertyType() as $propertyType) : ?>
                                              <option value="<?= $propertyType->id ?>"><?= $propertyType->label ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Titre</label>
                                        <input type="text" id="title" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price_per_night">Prix par nuit ($)</label>
                                        <input type="number" id="price_per_night" name="price_per_night" class="form-control" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rooms">Nombre de chambres</label>
                                        <input type="number" id="rooms" name="rooms" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="beds">Nombre de lits</label>
                                        <input type="number" id="beds" name="beds" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="baths">Nombre de salles de bains</label>
                                        <input type="number" id="baths" name="baths" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="max_guests">Nombre de personne</label>
                                        <input type="number" id="max_guests" name="max_guests" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active">Actif</label>
                                        <select id="is_active" name="is_active" class="form-control" required>
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                        </select>
                                    </div>




                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" required value="123 Rue de Paris">
                                    </div>
                                    <div class="form-group">
                                        <label for="zip_code" class="form-label">Zip Code</label>
                                        <input type="text" id="zip_code" name="zip_code" class="form-control" required value="75001">
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" id="city" name="city" class="form-control" required value="Paris">
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" id="country" name="country" class="form-control" required value="France">
                                    </div>





                                    <input type="text" id="user_id" name="user_id" class="form-control" value="<?= $user->id ?>" style="display: none">





                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
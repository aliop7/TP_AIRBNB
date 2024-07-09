<?php
    use App\AppRepoManager;
?>

<main class="container-fluid p-0 d-flex flex-column align-items-center justify-content-center">
    <!-- Cards container -->
    <section class="container-fluid px-3 px-sm-5 my-3 py-3">
        <div class="row">
            <?php foreach (AppRepoManager::getRm()->getPropertyRepository()->getAllProperties() as $propertyIndex => $property) : ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                    <a href="/property/<?= $property->id ?>">
                        <div class="card">
                            <div id="carousel<?= $propertyIndex ?>" class="carousel slide">
                                <img class="save-btn" src="assets/icons/upload.svg" alt="">

                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carousel1indicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carousel1indicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carousel1indicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>

                                <div class="carousel-inner">

                                    <?php foreach ($property->images as $imageIndex => $image) : ?>
                                        <div class="carousel-item <?= $imageIndex === 0 ? 'active' : '' ?>">
                                            <img src="assets/images/<?= $image->image_path ?>" class="img-fluid">
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $propertyIndex ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true">
                                        <img src="assets/icons/icons8-back-50.png" alt="">
                                    </span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel<?= $propertyIndex ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true">
                                        <img src="assets/icons/icons8-forward-50.png" alt="">
                                    </span>
                                </button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $property->title ?></h5>
                                <p class="card-text"><?= $property->description ?></p>
                                <p class="card-text"><?= $property->pricePerNight ?>$ per night</p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>














    <!-- Carousel section -->
    <section class="container-fluid px-3 px-sm-5 py-5" id="inspiration">
        <div class="container-fluid">
            <div class="row">
                <div class="col p-0">
                    <h2>Inspiration for future getaways</h2>
                    <div class="position-relative">
                        <div class="scroll-container" id="scroll-container">
                            <ul class="nav nav-tabs nav-underline dc" id="myTab" role="tablist">
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="popular" data-bs-toggle="tab"
                                            data-bs-target="#uno" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true">Popular</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="arts&culture" data-bs-toggle="tab"
                                            data-bs-target="#due" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Arts &
                                            culture</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="outdoors" data-bs-toggle="tab"
                                            data-bs-target="#tre" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false">Outdoors</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="mountains" data-bs-toggle="tab"
                                            data-bs-target="#quattro" type="button" role="tab"
                                            aria-controls="profile-tab-pane"
                                            aria-selected="false">Mountains</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="beach" data-bs-toggle="tab"
                                            data-bs-target="#cinque" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false">Beach</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="uniqueStays" data-bs-toggle="tab"
                                            data-bs-target="#sei" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Unique
                                            stays</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="categories" data-bs-toggle="tab"
                                            data-bs-target="#sette" type="button" role="tab"
                                            aria-controls="contact-tab-pane"
                                            aria-selected="false">Categories</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="thingstoDo" data-bs-toggle="tab"
                                            data-bs-target="#otto" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Things to
                                            do</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="travelTips" data-bs-toggle="tab"
                                            data-bs-target="#nove" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false">Travel tips &
                                            inspiration</button>
                                    </li>
                                </div>
                                <div class="scroll-item ">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="airbnb" data-bs-toggle="tab"
                                            data-bs-target="#dieci" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Airbnb-friendly
                                            apartments</button>
                                    </li>
                                </div>
                            </ul>

                        </div>
                        <span class="carousel-arrow left" id="prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </span>
                        <span class="carousel-arrow right" id="next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="popular" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Canmore</li>
                            <li>Pet-friendly rentals</li>
                        </ul>
                        <ul>
                            <li>Marbella</li>
                            <li>Vacation rentals</li>
                        </ul>
                        <ul>
                            <li>Amsterdam</li>
                            <li>Villa rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Davenport</li>
                            <li>House rentals</li>
                        </ul>
                        <ul>
                            <li>London</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Paris</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Tokyo</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Prague</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Leeds</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Andorra</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>New York</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Milan</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Valencia</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Rome</li>
                            <li>Villa rentals</li>
                        </ul>
                        <ul>
                            <li>Sussex</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="due" role="tabpanel" aria-labelledby="arts&culture" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Canmore</li>
                            <li>Pet-friendly rentals</li>
                        </ul>
                        <ul>
                            <li>Marbella</li>
                            <li>Vacation rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>London</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Paris</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Tokyo</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Prague</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Andorra</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>New York</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Milan</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Rome</li>
                            <li>Villa rentals</li>
                        </ul>
                        <ul>
                            <li>Sussex</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tre" role="tabpanel" aria-labelledby="outdoors" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Cork</li>
                            <li>Pet-friendly rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Berlin</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>La Rochelle</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Windsor</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Rome</li>
                            <li>Villa rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="quattro" role="tabpanel" aria-labelledby="mountains" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Dolomites</li>
                            <li>Italy</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Mount Fuji</li>
                            <li>Japan</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Swiss Alps</li>
                            <li>Switzerland</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">

                        <ul>
                            <li>Mount Kilimanjaro</li>
                            <li>Tanzania</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Mount Ranier</li>
                            <li>United States</li>
                        </ul>>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Sun Valley</li>
                            <li>United States</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cinque" role="tabpanel" aria-labelledby="beach" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Tenerife</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Marbella</li>
                            <li>Vacation rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Brighton</li>
                            <li>House rentals</li>
                        </ul>
                        <ul>
                            <li>Sorrento</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Lanzarote</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Okinawa</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Barcelona</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Naples</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Lisbona</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Valencia</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Nice</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Porto</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sei" role="tabpanel" aria-labelledby="uniqueStays" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Canmore</li>
                            <li>Pet-friendly rentals</li>
                        </ul>
                        <ul>
                            <li>Marbella</li>
                            <li>Vacation rentals</li>
                        </ul>
                        <ul>
                            <li>Amsterdam</li>
                            <li>Villa rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Davenport</li>
                            <li>House rentals</li>
                        </ul>
                        <ul>
                            <li>London</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Paris</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Tokyo</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Prague</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Leeds</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Andorra</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>New York</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Milan</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Valencia</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Rome</li>
                            <li>Villa rentals</li>
                        </ul>
                        <ul>
                            <li>Sussex</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sette" role="tabpanel" aria-labelledby="categories" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Camping</li>
                        </ul>
                        <ul>
                            <li>Arctic</li>
                        </ul>
                        <ul>
                            <li>Countryside</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Farms</li>
                        </ul>
                        <ul>
                            <li>Luxe</li>
                        </ul>
                        <ul>
                            <li>National Parks</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Tiny Homes</li>
                        </ul>
                        <ul>
                            <li>Desing</li>
                        </ul>
                        <ul>
                            <li>Cabins</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>OMG!</li>
                        </ul>
                        <ul>
                            <li>Amazing Pools</li>
                        </ul>
                        <ul>
                            <li>Camper Vans</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Castles</li>
                        </ul>
                        <ul>
                            <li>Ryokans</li>
                        </ul>
                        <ul>
                            <li>Vineyards</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Containers</li>
                        </ul>
                        <ul>
                            <li>Farms</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="otto" role="tabpanel" aria-labelledby="thingstoDo" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Tokyo</li>
                            <li>Japan</li>
                        </ul>
                        <ul>
                            <li>Milan</li>
                            <li>Italy</li>
                        </ul>
                        <ul>
                            <li>Rome</li>
                            <li>Italy</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Lisbon</li>
                            <li>Portugal</li>
                        </ul>
                        <ul>
                            <li>London</li>
                            <li>UK</li>
                        </ul>
                        <ul>
                            <li>Paris</li>
                            <li>France</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Spain</li>
                        </ul>
                        <ul>
                            <li>Kyoto</li>
                            <li>Japan</li>
                        </ul>
                        <ul>
                            <li>Berlin</li>
                            <li>Germany</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Prague</li>
                            <li>Czech Republic</li>
                        </ul>
                        <ul>
                            <li>Leeds</li>
                            <li>UK</li>
                        </ul>
                        <ul>
                            <li>Andorra</li>
                            <li>Spain</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>New York</li>
                            <li>USA</li>
                        </ul>
                        <ul>
                            <li>Seoul</li>
                            <li>South Korea</li>
                        </ul>
                        <ul>
                            <li>Valencia</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Athens</li>
                            <li>Greece</li>
                        </ul>
                        <ul>
                            <li>San Diego</li>
                            <li>California</li>
                        </ul>
                        <ul>
                            <li>Boston</li>
                            <li>USA</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nove" role="tabpanel" aria-labelledby="travelTips" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Canmore</li>
                            <li>Pet-friendly rentals</li>
                        </ul>
                        <ul>
                            <li>Marbella</li>
                            <li>Vacation rentals</li>
                        </ul>
                        <ul>
                            <li>Amsterdam</li>
                            <li>Villa rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Davenport</li>
                            <li>House rentals</li>
                        </ul>
                        <ul>
                            <li>London</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Paris</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Tokyo</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Prague</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Leeds</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Andorra</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>New York</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Milan</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Valencia</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Rome</li>
                            <li>Villa rentals</li>
                        </ul>
                        <ul>
                            <li>Sussex</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="dieci" role="tabpanel" aria-labelledby="airbnb" tabindex="0">
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Canmore</li>
                            <li>Pet-friendly rentals</li>
                        </ul>
                        <ul>
                            <li>Marbella</li>
                            <li>Vacation rentals</li>
                        </ul>
                        <ul>
                            <li>Amsterdam</li>
                            <li>Villa rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Davenport</li>
                            <li>House rentals</li>
                        </ul>
                        <ul>
                            <li>London</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Paris</li>
                            <li>Cottage rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Seville</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Tokyo</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Prague</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Leeds</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Andorra</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>New York</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Milan</li>
                            <li>Flat rentals</li>
                        </ul>
                        <ul>
                            <li>Valencia</li>
                            <li>Holiday rentals</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <ul>
                            <li>Munich</li>
                            <li>Holiday rentals</li>
                        </ul>
                        <ul>
                            <li>Rome</li>
                            <li>Villa rentals</li>
                        </ul>
                        <ul>
                            <li>Sussex</li>
                            <li>Flat rentals</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
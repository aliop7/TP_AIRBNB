<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<center class="my-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".main-modal">login / register</button>
</center>

<div class="modal fade main-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header pt-4">
        <h5 class="modal-title" id="myExtraLargeModalLabel"><strong style="color: #d70466"><b>Connexion ou inscription</b></strong></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center align-items-center my-5">
            <div class="card p-4 rounded-3 w-100">
                <div id="response-container" class="mb-3"></div>
                <form id="main-form">
                    <div class="mb-3">
                        <h3 class="mb-4">Bienvenue sur Airbnb</h3>
                        <div class="input-group input-group-lg my-5">
                            <input type="email" name="email" id="email" class="form-control border rounded" aria-label="Large" placeholder="Adresse e-mail" required>
                        </div>
                    </div>
                    <button type="submit" class="btn w-100 btn-lg btn-block" style="background-color: #d70466"><b class="text-white">Continuer</b></button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainForm = document.getElementById('main-form');
        const emailInput = document.querySelector('input[name="email"]');

        mainForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const inputs = mainForm.querySelectorAll('input');
            const names = Array.from(inputs).map(input => input.getAttribute('name'));

            if (names.length === 1 && names.includes('email')) {
                const formData = new URLSearchParams();
                formData.append('email', emailInput.value);

                fetch('/exist', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: formData
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(json => {
                    if (json.exist) {
                        const passwordInput = document.createElement('input');
                        passwordInput.type = 'password';
                        passwordInput.name = 'password';
                        passwordInput.className = 'form-control border rounded mt-3';
                        passwordInput.setAttribute('aria-label', 'Large');
                        passwordInput.placeholder = 'Mot de passe';
                        passwordInput.required = true;

                        emailInput.style.display = "none";
                        emailInput.parentElement.appendChild(passwordInput);
                    } else {
                        const passwordInput = document.createElement('input');
                        passwordInput.type = 'password';
                        passwordInput.name = 'password';
                        passwordInput.className = 'form-control border rounded mt-3';
                        passwordInput.setAttribute('aria-label', 'Large');
                        passwordInput.placeholder = 'Mot de passe';
                        passwordInput.required = true;
                        emailInput.parentElement.appendChild(passwordInput);

                        const lastnameInput = document.createElement('input');
                        lastnameInput.type = 'text';
                        lastnameInput.name = 'lastname';
                        lastnameInput.className = 'form-control border rounded mt-3';
                        lastnameInput.setAttribute('aria-label', 'Large');
                        lastnameInput.placeholder = 'Nom de famille';
                        lastnameInput.required = true;
                        emailInput.parentElement.appendChild(lastnameInput);

                        const firstnameInput = document.createElement('input');
                        firstnameInput.type = 'text';
                        firstnameInput.name = 'firstname';
                        firstnameInput.className = 'form-control border rounded mt-3';
                        firstnameInput.setAttribute('aria-label', 'Large');
                        firstnameInput.placeholder = 'Prénom';
                        firstnameInput.required = true;
                        emailInput.parentElement.appendChild(firstnameInput);
                    }
                }).catch(error => {
                    console.error('Erreur de requête :', error);
                });
            } else if (names.length === 2 && names.includes('email') && names.includes('password')) {

                const formData = new URLSearchParams();
                formData.append('email', emailInput.value);
                formData.append('password', document.querySelector('input[name="password"]').value);

                fetch('/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: formData
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(json => {
                    if (json['success']) window.location.href = '/';

                    const container = document.getElementById('response-container');

                    container.innerHTML = '';

                    const errorList = document.createElement('ul');

                    json.errors.forEach(function(error) {
                        const errorItem = document.createElement('li');

                        errorItem.classList.add("text-danger");

                        errorItem.textContent = error;

                        errorList.appendChild(errorItem);
                    });

                    container.appendChild(errorList);
                }).catch(error => {
                    console.error('Erreur de requête :', error);
                });

            } else if (names.length === 4 && names.includes('email') && names.includes('password') && names.includes('lastname') && names.includes('firstname')) {

                const formData = new URLSearchParams();
                formData.append('email', emailInput.value);
                formData.append('password', document.querySelector('input[name="password"]').value);
                formData.append('lastname', document.querySelector('input[name="lastname"]').value);
                formData.append('firstname', document.querySelector('input[name="firstname"]').value);

                fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: formData
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(json => {

                    if (json['success']) window.location.href = '/';

                    const container = document.getElementById('response-container');

                    container.innerHTML = '';

                    const errorList = document.createElement('ul');

                    json.errors.forEach(function(error) {
                        const errorItem = document.createElement('li');

                        errorItem.classList.add("text-danger");

                        errorItem.textContent = error;

                        errorList.appendChild(errorItem);
                    });

                    container.appendChild(errorList);
                }).catch(error => {
                    console.error('Erreur de requête :', error);
                });
            }
        });
    });
</script>
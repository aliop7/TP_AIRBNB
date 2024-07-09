<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>





<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".main-modal">main modal</button>

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
    $(document).ready(function() {
        $("#main-form").submit(function(event){
            event.preventDefault();

            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            var lastname = $("input[name='lastname']").val();
            var firstname = $("input[name='firstname']").val();

            if(password === undefined)
            {
                $.post("/register", 
                {
                    email: email
                })
                .done(function(response) 
                {
                    var jsonResponse = JSON.parse(response);

                    if (jsonResponse['exist'])
                    {
                        const emailInput = document.querySelector('input[type=email]');

                        emailInput.style.display = "none";

                        var input = document.createElement('input');
                        input.type = 'password';
                        input.name = 'password';
                        input.id = 'password';
                        input.className = 'form-control border rounded';
                        input.setAttribute('aria-label', 'Large');
                        input.placeholder = 'Mot de passe';
                        input.required = true;

                        emailInput.parentElement.appendChild(input);
                    }
                    else
                    {
                        const emailInput = document.querySelector('input[type=email]');

                        var input = document.createElement('input');
                        input.type = 'password';
                        input.name = 'password';
                        input.id = 'password';
                        input.className = 'form-control border rounded mt-3';
                        input.setAttribute('aria-label', 'Large');
                        input.placeholder = 'Mot de passe';
                        input.required = true;
                        emailInput.parentElement.appendChild(input);

                        var lastnameInput = document.createElement('input');
                        lastnameInput.type = 'text';
                        lastnameInput.name = 'lastname';
                        lastnameInput.id = 'lastname';
                        lastnameInput.className = 'form-control border rounded mt-3';
                        lastnameInput.setAttribute('aria-label', 'Large');
                        lastnameInput.placeholder = 'lastname';
                        lastnameInput.required = true;
                        emailInput.parentElement.appendChild(lastnameInput);

                        var firstnameInput = document.createElement('input');
                        firstnameInput.type = 'text';
                        firstnameInput.name = 'firstname';
                        firstnameInput.id = 'firstname';
                        firstnameInput.className = 'form-control border rounded mt-3';
                        firstnameInput.setAttribute('aria-label', 'Large');
                        firstnameInput.placeholder = 'firstname';
                        firstnameInput.required = true;
                        emailInput.parentElement.appendChild(firstnameInput);
                    }
                })
            }
            else if(lastname === undefined)
            {
                $.post("/login", {
                    email: email,
                    password: password
                })
                .done(function(response) {
                    var json = JSON.parse(response);

                    if (json['success']) window.location.href = '/';

                    var container = document.getElementById('response-container');
                    
                    container.innerHTML = '';

                    var errorList = document.createElement('ul');

                    json.errors.forEach(function(error) {
                        var errorItem = document.createElement('li');

                        errorItem.classList.add("text-danger");
                        
                        errorItem.textContent = error;

                        errorList.appendChild(errorItem);
                    });

                    container.appendChild(errorList);
                })
            }
            else
            {
                $.post("/register", {
                    email: email,
                    password: password,
                    lastname: lastname,
                    firstname: firstname,
                })
                .done(function(response) {
                    var json = JSON.parse(response);

                    alert(response);

                    if (json['success']) window.location.href = '/';

                    var container = document.getElementById('response-container');
                    
                    container.innerHTML = '';

                    var errorList = document.createElement('ul');

                    json.errors.forEach(function(error) {
                        var errorItem = document.createElement('li');

                        errorItem.classList.add("text-danger");
                        
                        errorItem.textContent = error;

                        errorList.appendChild(errorItem);
                    });

                    container.appendChild(errorList);
                })
            }
        });
    });
</script>
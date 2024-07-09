<?php if ($auth::isAuth()) $auth::redirect('/') ?>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="card p-4 shadow-lg rounded-3" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4">Register</h2>
        <div id="response-container" class="mb-3"></div>
        <form id="register-form">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Votre nom</label>
                <input type="text" name="lastname" class="form-control border" style="padding: 0.4rem" id="lastname" required>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Votre prénom</label>
                <input type="text" name="firstname" class="form-control border" style="padding: 0.4rem" id="firstname" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Votre téléphone</label>
                <input type="text" name="phone" class="form-control border" style="padding: 0.4rem" id="phone" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Continuer</button>
        </form>
        <p class="mt-3 text-center">J'ai déjà un compte, <a href="/login">je me connecte</a></p>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#register-form").submit(function(event){
            event.preventDefault();

            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            var lastname = $("input[name='lastname']").val();
            var firstname = $("input[name='firstname']").val();
            var phone = $("input[name='phone']").val();

            $.post("/register", {
                email: email,
                password: password,
                lastname: lastname,
                firstname: firstname,
                phone: phone
            })
            .done(function(response) {
                var json = JSON.parse(response);

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
        });
    });
</script>
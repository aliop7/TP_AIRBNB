<?php if ($auth::isAuth()) $auth::redirect('/') ?>

<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="card p-4 shadow-lg rounded-3" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4">Login</h2>
        <div id="response-container" class="mb-3"></div>
        <form id="login-form">
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Continuer</button>
        </form>
        <p class="mt-3 text-center">Je n'ai pas de compte, <a href="/register">je m'inscris</a></p>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#login-form").submit(function(event){
            event.preventDefault();

            var email = $("input[name='email']").val();

            var password = $("input[name='password']").val();

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
        });
    });
</script>


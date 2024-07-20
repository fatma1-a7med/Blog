<?php 
use Core\Session;

require '../Views/Partials/header.php'; 
$errors = Session::flash('errors');
$old = Session::flash('old');
?>
<section class="vh-50 d-flex align-items-center justify-content-center" style="background-color: #1B3764;">
  <div class="container py-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem; height: 575px;">
          <div class="row no-gutters">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/images/login.svg" alt="login form" class="img-fluid my-5" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="/login" method="POST">

                  <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h3>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" 
                     id="email"
                     name="email"
                     placeholder="Enter your email address"
                     value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                     class="form-control form-control-lg <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                     />
                    <?php if (isset($errors['email'])) : ?>
                      <div class="invalid-feedback"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" 
                     id="password"
                     name="password"
                     placeholder="Enter your password"
                     class="form-control form-control-lg <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                  />
                    <?php if (isset($errors['password'])) : ?>
                      <div class="invalid-feedback"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" style="border: 2px solid #1B3764;">Login</button>
                  </div>

                  <input type="checkbox" name="remember_me" id="remember_me">
                  <label for="remember_me">Remember Me</label>
                  
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/register" style="color: #393f81;">Register here</a></p>
               
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

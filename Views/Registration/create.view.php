<?php require '../Views/Partials/header.php'; ?>
<style>
  .form-outline {
    width: 100%;
}

.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    display: none;
}

.is-invalid + .invalid-feedback {
    display: block;
}
</style>

<section class="vh-65 d-flex align-items-center justify-content-center" style="background-color: #1B3764;">
  <div class="container py-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem; height: 820px;">
          <div class="row no-gutters">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/images/login.svg" alt="register form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; margin-top: 130px;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form action="/register" method="POST" enctype="multipart/form-data">
                  <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create an account</h3>

                  <div class="form-row">
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="first_name">First Name</label>
                      <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>" class="form-control form-control-lg <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['first_name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['first_name'] ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="last_name">Last Name</label>
                      <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>" class="form-control form-control-lg <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['last_name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['last_name'] ?></div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="user_name">Username</label>
                      <input type="text" id="user_name" name="user_name" value="<?= htmlspecialchars($_POST['user_name'] ?? '') ?>" class="form-control form-control-lg <?= isset($errors['user_name']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['user_name'])) : ?>
                        <div class="invalid-feedback"><?= $errors['user_name'] ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="phone_number">Phone Number</label>
                      <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($_POST['phone_number'] ?? '') ?>" class="form-control form-control-lg <?= isset($errors['phone_number']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['phone_number'])) : ?>
                        <div class="invalid-feedback"><?= $errors['phone_number'] ?></div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="email">Email Address</label>
                      <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" class="form-control form-control-lg <?= isset($errors['email']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['email'])) : ?>
                        <div class="invalid-feedback"><?= $errors['email'] ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control form-control-lg <?= isset($errors['password']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['password'])) : ?>
                        <div class="invalid-feedback"><?= $errors['password'] ?></div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-outline col-md-6 mb-4">
                      <label class="form-label" for="address">Address</label>
                      <input type="text" id="address" name="address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>" class="form-control form-control-lg <?= isset($errors['address']) ? 'is-invalid' : '' ?>" required />
                      <?php if (isset($errors['address'])) : ?>
                        <div class="invalid-feedback"><?= $errors['address'] ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="form-outline mb-4 col-md-6">
                      <label class="form-label" for="image">Profile Image</label>
                      <input type="file" id="image" name="image" class="form-control form-control-lg <?= isset($errors['image']) ? 'is-invalid' : '' ?>" />
                      <?php if (isset($errors['image'])) : ?>
                        <div class="invalid-feedback"><?= $errors['image'] ?></div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <?php if (isset($errors)) : ?>
                    <script>
                      let errorMsg = <?= json_encode($errors) ?>;
                      for (let key in errorMsg) {
                          Swal.fire('Error!', errorMsg[key], 'error');
                      }
                    </script>
                  <?php endif; ?>

                  <?php if (isset($message)) : ?>
                    <script>
                      Swal.fire('Success!', '<?= $message ?>', 'success')
                          .then(() => {
                              window.location.href = '/';
                          });
                    </script>
                  <?php endif; ?>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" style="border: 2px solid #1B3764;">Register</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="/login" style="color: #393f81;">Login here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

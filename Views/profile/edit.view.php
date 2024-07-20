<?php

use Core\Session;

view('Partials/navbar.php');
?>

<div class="page-content page-container my-3" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile p-4" style="background-color: #1B3764;">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="../<?= htmlspecialchars($users['image']) ?>" class="img-radius" alt="" width="130" height="130">
                                </div>
                                <h6 class="m-b-25 my-4"><?= htmlspecialchars($users['first_name'] . ' ' . $users['last_name']) ?></h6>
                                <p class="text-white"><?= htmlspecialchars($users['user_name']) ?></p>
                                <a href="/password/edit" class="text-white">Update Password?</a>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block mt-3">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600 text-primary">Edit Information</h6>
                                <hr style="width:10vw; margin-top: -.2rem;"/>
                                <form action="/profile" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="id" value="<?= $users['id'] ?>"/>
                                   <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="first_name" class="m-b-10 f-w-600">First Name</label>
                                                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= htmlspecialchars($users['first_name']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name" class="m-b-10 f-w-600">Last Name</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= htmlspecialchars($users['last_name']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="user_name" class="m-b-10 f-w-600">Username</label>
                                                <input type="text" name="user_name" id="user_name" class="form-control" value="<?= htmlspecialchars($users['user_name']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email" class="m-b-10 f-w-600">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($users['email']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone_number" class="m-b-10 f-w-600">Phone Number</label>
                                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?= htmlspecialchars($users['phone_number']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="address" class="m-b-10 f-w-600">Address</label>
                                                <input type="text" name="address" id="address" class="form-control" value="<?= htmlspecialchars($users['address']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="image" class="m-b-10 f-w-600">Profile Image</label>
                                                <input type="file" name="image" id="image" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary my-4">Update Profile</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <br/><br/>
</div>

<?php
require '../Views/Partials/footer.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if ($success = Session::flash('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $success ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        <?php if ($error = Session::flash('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= $error ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    });
</script>

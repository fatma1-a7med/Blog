<?php
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
                                    <img src="<?= htmlspecialchars($users['image']) ?>" class="img-radius" alt="<?= htmlspecialchars($users['first_name'])." ".htmlspecialchars($users['last_name']) ?>" width="130" height="130">
                                </div>
                                <h6 class="m-b-25 my-4"><?= htmlspecialchars($users['first_name'])." ".htmlspecialchars($users['last_name']) ?></h6>
                                <p class="text-white"><?= htmlspecialchars($users['user_name']) ?></p>
                                <a href="/profile/edit" class="text-white"><i class="fas fa-user-edit m-t-10 f-16" style="cursor:pointer"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block mt-3">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600 text-primary">Information</h6>
                                <hr style="width:10vw; margin-top: -.2rem;" />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?= htmlspecialchars($users['email']) ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone Number</p>
                                        <h6 class="text-muted f-w-400"><?= htmlspecialchars($users['phone_number']) ?></h6>
                                    </div>
                                    <hr class="m-auto my-3" style="width:48vw; margin-top: -.2rem;" />
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400"><?= htmlspecialchars($users['address']) ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Posts</p>
                                        <h6 class="text-muted f-w-400"><?= count($posts) ?></h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="facebook"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="twitter"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="instagram"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
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

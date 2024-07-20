<?php
view('Partials/navbar.php');
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #1B3764; color: white;">
                    <h2>Contact Us</h2>
                </div>
                <div class="card-body p-4">
                    <p class="text-center">If you have any questions, suggestions, or concerns, please feel free to reach out to us. We are here to help and would love to hear from you!</p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary">Email</h5>
                            <p>support@blog.com</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary">Phone</h5>
                            <p>+20 123 456 7890</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">Address</h5>
                            <p>123 Street, Mit Ghamr, Egypt</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <h5 class="text-primary">Follow Us</h5>
                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                <li class="d-inline-block mx-2"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="mdi mdi-facebook feather icon-facebook" aria-hidden="true"></i></a></li>
                                <li class="d-inline-block mx-2"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="mdi mdi-twitter feather icon-twitter" aria-hidden="true"></i></a></li>
                                <li class="d-inline-block mx-2"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="mdi mdi-instagram feather icon-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view('Partials/footer.php');
?>

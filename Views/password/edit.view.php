<?php

view('Partials/navbar.php');
?>
<div class="card w-50 m-auto my-4">
    <div class="card-body">
        <h6 class="mb-3 text-primary">Update Password</h6>
        <form action="/password/update" method="POST">
            <div class="form-group">
                <label for="old-password">Old Password</label>
                <input type="password" class="form-control" id="old-password" name="old_password" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="_method" value="PATCH"/>
                <label for="new-password">New Password</label>
                <input type="password" class="form-control" id="new-password" name="new_password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Password</button>
        </form>
    </div>
</div>

<?php

view('Partials/footer.php');
?>

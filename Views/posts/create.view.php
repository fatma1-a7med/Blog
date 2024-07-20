<?php

use Core\Session;

view('Partials/navbar.php'); 
?>

<!-- Page content-->
<div class="w-75 m-auto my-5">
    <div class="row">
        <div class="col-lg-8">
           
            <!-- New Post Form -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add New Post</h2>
                </div>
                <div class="card-body">
                    <form action="/posts/create" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" id="title" name="title" required value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
                            <?php if (isset($errors['title'])) : ?>
                        <div class="invalid-feedback"><?= $errors['title'] ?></div>
                      <?php endif; ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea class="form-control <?= isset($errors['content']) ? 'is-invalid' : '' ?>" id="content" name="content" rows="5" required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
                            <?php if (isset($errors['content'])) : ?>
                        <div class="invalid-feedback"><?= $errors['content'] ?></div>
                      <?php endif; ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file <?= isset($errors['image']) ? 'is-invalid' : '' ?>" id="image" name="image" required>
                            <?php if (isset($errors['image'])) : ?>
                        <div class="invalid-feedback"><?= $errors['image'] ?></div>
                      <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view('Partials/footer.php');
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if ($message = Session::flash('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $message ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        <?php if ($message = Session::flash('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= $message ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    });
</script>
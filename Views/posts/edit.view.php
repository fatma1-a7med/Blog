<?php

use Core\Session;

view('Partials/navbar.php');
?>

<div class="w-75 m-auto mt-5">
    <h2 class="text-center">Edit Post</h2>
    <form action="/post/update" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="hidden" name="_method" value="PATCH">
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="<?= htmlspecialchars($post['title']) ?>">
        </div>
        <div class="form-group mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div>
            <button type="submit" class="btn btn-primary mt-3">Update Post</button>
        </div>
    </form>
</div>
<br><br>
<script>
    <?php if ($successMessage = Session::flash('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $successMessage ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>

    <?php if ($errorMessage = Session::flash('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $errorMessage ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>
</script>

<?php
view('Partials/footer.php');
?>

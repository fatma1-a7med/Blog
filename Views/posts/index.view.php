<?php

use Core\Session;


view('Partials/navbar.php');
?>
<style>
    .allPosts {
        width: 120vw;
    }
    .post-header {
        display: flex;
        align-items: center;
    }
    .post-header img {
        border-radius: 50%;
        margin-right: 10px;
    }
    .comment-header {
        display: flex;
        align-items: center;
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .comment-header img {
        border-radius: 50%;
        margin-right: 10px;
    }
    .card-img-top {
        width: 760px;
        height: 590px;
        margin: auto;
        border-radius: 0;
    }
    .card-footer {
        background-color: #fff;
    }
    .comment {
        background-color: #f1f1f1;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .comment-content {
        padding-left: 70px;
        position: relative;
    }
    .delete-comment-form {
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .delete-comment-btn {
        background-color: red;
        border: none;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .delete-comment-btn:hover {
        background-color: darkred;
    }
</style>

<!-- Page content -->
<div class="container mt-5 allPosts">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Add New Post Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">My Posts</h2>
                <a href="/posts/create" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add New Post
                </a>
            </div>
            <?php if (!empty($posts)): ?>
            <!-- Post content -->
            <?php foreach ($posts as $post): ?>
               
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="post-header">
                            <img src="<?= htmlspecialchars($post['user_image']) ?>" alt="User Image" width="70" height="70">
                            <div>
                                <div class="fw-bold"><?= htmlspecialchars($post['first_name'] . ' ' . $post['last_name']) ?></div>
                                <div class="text-muted fst-italic">Posted on <?= htmlspecialchars($post['created_at']) ?></div>
                            </div>
                        </div>
                        <a href="/post?id=<?= $post['id'] ?>" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                    <div class="card-body mt-3 mx-5">
                        <p class="card-text"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    </div>
                    <img class="card-img-top mb-5" src="<?= htmlspecialchars($post['image']) ?>" alt="Post Image">

                    <!-- Comments section -->
                    <div class="card-footer">
                        <h3 class="mb-3">Comments:</h3>
                        <?php if (!empty($commentsByPost[$post['id']])): ?>
                            <?php foreach ($commentsByPost[$post['id']] as $comment): ?>
                                <div class="comment">
                                    <div class="comment-header d-flex">
                                        <img src="<?= htmlspecialchars($comment['image']) ?>" alt="User Image" class="rounded-circle me-3" width="50">
                                        <div>
                                            <div class="fw-bold"><?= htmlspecialchars($comment['first_name'] . ' ' . $comment['last_name']) ?> (<?= htmlspecialchars($comment['user_name']) ?>)</div>
                                            <div class="text-muted"><?= htmlspecialchars($comment['created_at']) ?></div>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                        <?php if ($comment['user_id'] == $user['id']): ?>
                                            <form class="delete-comment-form" action="/comment/destroy" method="POST">
                                                <input type="hidden" name="delete_comment_id" value="<?= $comment['id'] ?>">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-danger btn-sm delete-comment-btn">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No comments yet.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Add Comment Form -->
                    <div class="card-footer">
                        <h3>Leave a Comment:</h3>
                        <form action="/comments/create" method="POST">
                            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="3" placeholder="Join the discussion!" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
                
            <?php endforeach; ?>

            <?php else: ?>
                   <h4 class="alert alert-damnger">No Posts yet.<h4/>
                 <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-comment-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    <?php if ($successMessage = Session::flash('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $successMessage ?>'
        });
    <?php endif; ?>

    <?php if ($errorMessage = Session::flash('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $errorMessage ?>'
        });
    <?php endif; ?>
});
</script>

<?php
view('Partials/footer.php');
?>

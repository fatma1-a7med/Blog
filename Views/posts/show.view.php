<?php
view('Partials/header.php');
view('Partials/navbar.php');
?>

<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
    }

    .post-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .post-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .post-header img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .post-title {
        font-size: 24px;
        font-weight: bold;
    }

    .post-meta {
        color: #606770;
        font-size: 12px;
    }

    .post-image {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .post-content {
        font-size: 16px;
        line-height: 1.6;
        color: #1c1e21;
    }

    .comments-section {
        margin-top: 30px;
    }

    .comment {
        background-color: #f5f6f7;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .comment-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .comment-header img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .comment-content {
        padding-left: 50px;
        position: relative;
    }

    .comment-meta {
        font-size: 12px;
        color: #606770;
        margin-bottom: 5px;
    }

    .comment-text {
        font-size: 14px;
        color: #1c1e21;
    }

    .btn-warning, .btn-danger {
        margin-top: 10px;
    }

    .post-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-warning {
        background-color: #fbc02d;
        color: white;
        border: none;
    }

    .btn-warning:hover {
        background-color: #f9a825;
    }

    .btn-danger {
        background-color: #d32f2f;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c62828;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <!-- Post content-->
            <div class="post-card">
                <!-- Post header-->
                <div class="post-header">
                    <img src="<?= htmlspecialchars($postAuthor['image']) ?>" alt="User Image">
                    <div>
                        <div class="fw-bold"><?= htmlspecialchars($postAuthor['first_name'] . ' ' . $postAuthor['last_name']) ?></div>
                        <div class="text-muted fst-italic">Posted on <?= htmlspecialchars($postAuthor['created_at']) ?></div>
                    </div>
                </div>

                <div class="post-title"><?= htmlspecialchars($post['title']) ?></div>
                <section class="post-content">
                    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                </section>
                <!-- Post image-->
                <figure class="mb-4"><img class="post-image" src="<?= htmlspecialchars($post['image']) ?>" alt="Post Image"></figure>
                <!-- Post content-->
                
            </div>

            <!-- Comments section -->
            <div class="comments-section">
                <h3>Comments:</h3>
                <?php if (!empty($comments)): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <div class="comment-header">
                                <img src="<?= htmlspecialchars($comment['image']) ?>" alt="User Image">
                                <div>
                                    <div class="fw-bold"><?= htmlspecialchars($comment['first_name'] . ' ' . $comment['last_name']) ?> (<?= htmlspecialchars($comment['user_name']) ?>)</div>
                                    <div class="comment-meta"><?= htmlspecialchars($comment['created_at']) ?></div>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p class="comment-text"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
            </div>

            <?php if (!empty($user) && $post['user_id'] == $user['id']): ?>

            <!-- Post actions -->
            <div class="post-actions">

                <a href="/post/edit?id=<?= $post['id'] ?>" class="btn btn-warning">Edit</a>
                <form action="/post/destroy" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <?php endif; ?>

          
        </div>
    </div>
</div>
<br><br>

<?php
view('Partials/footer.php');
?>

<section class="mb-5">
    <h3>Leave a Comment:</h3>
    <form action="/comments/create" method="POST">
        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="Join the discussion!" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>

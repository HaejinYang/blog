<div id="main__article" class="uk-container">
    <article class="uk-margin uk-article">
        <h1 class="uk-article-title"><?= $post->title ?></h1>
        <div class="uk-text-meta">
            by <?= $post->getUsername() ?>
        </div>
        <div class="uk-text-meta">
            <?= $post->getCreatedAt() ?>
            <?php if ($post->isOwner()) : ?>
                <span class="owner">
                    <a href="#" class="uk-link-text" id="delete">Delete</a>
                    <a href="/post/<?= $post->id ?>/edit" class="uk-link-text">Update</a>
                </span>
            <?php endif; ?>
        </div>
        <div class="uk-text-lead uk-margin-bottom"><?= $post->content ?></div>
    </article>
</div>

<script>
    const deleteBtn = document.getElementById('delete');
    deleteBtn.addEventListener('click', () => {
        fetch('/post/' + "<?=$post->id?>", {
            method: 'delete',
            body: JSON.stringify({_csrfToken: "<?=$_SESSION['CSRF_TOKEN']?>"})
        }).then(() => {
            window.location = '/'
        })
    });
</script>
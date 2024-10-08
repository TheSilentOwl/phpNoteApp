<?php require  base_path('views/partials/head.php') ?>
<?php require   base_path('views/partials/nav.php') ?>

<main class="note-show">
    <h1>My Notes</h1>
    <div class="actions">
        <a href="/notes?user_id=1" class="anchor-button">go back</a>
        <a href="/note/edit?id=<?=$note['id']?>" class="anchor-button edit">edit</a>
    </div>
    <section class="note-show">
        <article class="note">
            <article class="title">
                <?= htmlspecialchars($note['title']) ?>
            </article>
            <hr>
            <article class="body">
                <?= htmlspecialchars($note['body']) ?>

            </article>
        </article>

    </section>




</main>

<?php require   base_path('views/partials/footer.php') ?>
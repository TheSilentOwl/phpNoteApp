<?php require  base_path('views/partials/head.php') ?>
<?php require   base_path('views/partials/nav.php') ?>


<main class="note-index">
    <h1>My Notes</h1>
    <div class="note-actions">
            <a href="/notes/create" class="anchor-button">
                create-note
            </a>
            <form action="" method="POST" style="display: inline-block">
            <input type="text" name="id" value="<?= $notes[0]['user_id']?>" hidden>
            <button class="btn delete">delete All</button>
        </form>
        </div>
    <section class="note-index">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <a href="/note?id=<?= $note['id'] ?>">
                    <article class="note">
                        <article class="title">
                            <?= htmlspecialchars($note['title']) ?>
                        </article>
                        <hr>
                        <article class="body">
                            <?= htmlspecialchars($note['body']) ?>

                        </article>
                    </article>
                </a>
            <?php endforeach ?>
        </ul>
        


    </section>
</main>

<?php require   base_path('views/partials/footer.php') ?>
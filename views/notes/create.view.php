<?php require  base_path('views/partials/head.php') ?>
<?php require   base_path('views/partials/nav.php') ?>

<main class="note-create">
    <section class="note-create">
        <div class="form">
            <h2>create a note</h2>
            <form method="POST" action="/notes">

                <input type="text" name="note-title" id="note-title" value="<?= $_POST['note-title'] ?? '' ?>" placeholder="note title">
                <?php if (isset($errors['title'])) : ?>
                    <p style="color: red; font-size: 12.5px;"><?= $errors['title'] ?></p>
                <?php endif ?>

                <textarea name="note-body" id="note-body" cols="30" rows="10" placeholder="note body"><?= $_POST['note-body'] ?? '' ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                    <p style="color: red; font-size: 12.5px;"><?= $errors['body'] ?></p>
                <?php endif ?>

                <button class="btn">create note</button>

            </form>
        </div>
    </section>
</main>

<?php require   base_path('views/partials/footer.php') ?>
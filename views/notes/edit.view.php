<?php require  base_path('views/partials/head.php') ?>
<?php require   base_path('views/partials/nav.php') ?>
<?php
// dd($errors) 
// dd(parse_url($_SERVER['REQUEST_URI'])['path']);
// dd($_POST['_method']);


?>
<main class="note-edit">
    <section class="note-edit">
        <div class="form">
            <a href="/note?id=<?= $note['id'] ?>" style="justify-content: start">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </a>
            <h2>create a note</h2>
            <form method="POST" action="/note/edit?id=<?= $note['id'] ?>">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="text" name="note-title" id="note-title" value="<?= $_POST['note-title'] ?? $note['title'] ?>" placeholder="note title">

                <?php if (isset($errors['title'])) : ?>
                    <p style="color: red; font-size: 12.5px;"><?= $errors['title'] ?></p>
                <?php endif ?>

                <textarea name="note-body" id="note-body" cols="30" rows="10" placeholder="note body"><?= $_POST['note-body'] ?? $note['body'] ?></textarea>

                <?php if (isset($errors['body'])) : ?>
                    <p style="color: red; font-size: 12.5px;"><?= $errors['body'] ?></p>
                <?php endif ?>
                <div class="actions">
                    <button class="btn">update note</button>
                </div>
            </form>

            <form method="POST" style="position: absolute; bottom: 15px; right: 20px" action="/note">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="btn delete">delete</button>
            </form>
        </div>
    </section>
</main>

<?php require   base_path('views/partials/footer.php') ?>
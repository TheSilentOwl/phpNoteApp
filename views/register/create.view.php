<?php require  base_path('views/partials/head.php') ?>


<main class="register">
    <section class="register">
        <div class="form">
            <a href="/" style="justify-content: start">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </a>
            <h2>Register</h2>
            <form method="POST" action="/register">

                <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="email">
                <?php if (isset($errors['email'])) : ?>
                    <p style="color: red; font-size: 12.5px;"><?= $errors['email'] ?></p>
                <?php endif ?>

                <input type="text" name="password" id="password"  value="<?= $_POST['password'] ?? '' ?>" cols="30" rows="10" placeholder="password"> </input>
                <?php if (isset($errors['password'])) : ?>
                    <p style="color: red; font-size: 12.5px;"><?= $errors['password'] ?></p>
                <?php endif ?>

                <div class="actions">
                    <button class="btn">SIGN UP</button>
                </div>

            </form>

        </div>
    </section>
</main>

<?php require   base_path('views/partials/footer.php') ?>
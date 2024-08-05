<body>
    <nav>
        <a href="/" class="logo icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H288V352c0-17.7 14.3-32 32-32h80V96c0-8.8-7.2-16-16-16H64zM288 480H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V320v5.5c0 17-6.7 33.3-18.7 45.3l-90.5 90.5c-12 12-28.3 18.7-45.3 18.7H288z" />
            </svg>
        </a>
        <ul class="row">
            <li><a class="<?= urlIs('/') ? "active" : "" ?>" href="/">Home</a></li>
            <li><a class="<?= urlIs('/about') ? "active" : "" ?>" href="/about">About</a></li>
            <li><a class="<?= urlIs('/contact') ? "active" : "" ?>" href="/contact">Contact</a></li>
            <?php if ($_SESSION['user']['email'] ?? false) : ?>
                <li><a class="<?= urlIs('/notes') ? "active" : "" ?>" href="/notes">Notes</a></li>
            <?php endif ?>
        </ul>
        <?php if ($_SESSION['user']['email'] ?? false) : ?>
            <a href="#" class="user icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                </svg>
            </a>
        <?php else : ?>
            <ul class="row credential-handlers">
                <li><a href="/register">register</a></li>
                <li><a href="/sessions/create">login</a></li>
            </ul>
        <?php endif ?>

    </nav>
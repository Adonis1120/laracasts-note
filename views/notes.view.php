<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/banner.php" ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <?php foreach ($notes as $note) : ?>
                <ul>
                    <li>
                        <a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note["body"]) ?>
                        </a>
                    </li>
                </ul>
            <?php endforeach ?>
        </p>
        <p class="mt-6">
            <a href="/note/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require "partials/footer.php" ?>
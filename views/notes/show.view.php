<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-3">
            <a class="text-blue-500 underline" href="/notes">Go back.</a>
        </p>

        <p><?= htmlspecialchars($note["body"]) ?></p>

        <form action="" method="POST" class="mt-6">
            <input type="hidden" name="id" value="<?= $note["id"] ?>">
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>
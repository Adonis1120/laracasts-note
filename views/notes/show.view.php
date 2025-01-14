<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a class="text-blue-500 underline" href="/notes">Go back.</a>
        </p>

        <p><?= htmlspecialchars($note["body"]) ?></p>

        <div class="flex items-center mt-2">
            <a href="/note/edit?id=<?= $note["id"] ?>" class="text-sm text-blue-500 mr-4">Edit</a>
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note["id"] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>
        </div>

    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>
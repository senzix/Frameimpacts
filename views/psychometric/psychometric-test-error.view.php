<?php require "views/partials/header.php" ?>
<?php require "views/partials/banner.php" ?>

<main class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-8">
            <div class="uppercase tracking-wide text-sm text-red-500 font-semibold">Error</div>
            <h1 class="block mt-1 text-lg leading-tight font-medium text-black">Unable to Take Psychometric Test</h1>
            <p class="mt-2 text-gray-500">
                <?= htmlspecialchars($error) ?>
            </p>
            <div class="mt-6 text-center">
                <a href="/" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Return to Home
                </a>
            </div>
        </div>
    </div>
</main>

<?php require "views/partials/banner2.php" ?>
<?php require "views/partials/footer.php" ?>
<?php
declare(strict_types=1);

/**
 * Read the first heading and Objective field from a Markdown README.
 *
 * @return array{title: string, objective: string}
 */
function readChallenge(string $readmePath, string $fallbackTitle): array
{
    $markdown = file_get_contents($readmePath);

    if ($markdown === false) {
        return [
            'title' => $fallbackTitle,
            'objective' => 'Open this challenge to find out more.',
        ];
    }

    $title = $fallbackTitle;
    $objective = 'Open this challenge to find out more.';

    if (preg_match('/^#\s+(.+)$/m', $markdown, $matches) === 1) {
        $title = trim($matches[1]);
    }

    if (preg_match('/^\*\*Objective\*\*\s*:\s*(.+)$/mi', $markdown, $matches) === 1) {
        $objective = trim($matches[1]);
    }

    return ['title' => $title, 'objective' => $objective];
}

$challenges = [];
$folders = glob(__DIR__ . '/*', GLOB_ONLYDIR) ?: [];

foreach ($folders as $folderPath) {
    $folderName = basename($folderPath);
    $readmePath = $folderPath . '/README.md';

    if (!is_readable($readmePath)) {
        continue;
    }

    $details = readChallenge($readmePath, ucwords(str_replace(['-', '_'], ' ', $folderName)));
    $details['folder'] = $folderName;
    $challenges[] = $details;
}

usort(
    $challenges,
    static fn(array $a, array $b): int => strnatcasecmp($a['folder'], $b['folder'])
);

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Coding Challenges</title>
    <link rel="stylesheet" href="assets/css/combined.min.css">
</head>
<body class="dashboard-page">
    <main class="page">
        <p class="eyebrow"><?= count($challenges) ?> challenges available</p>
        <h1>Build something every day.</h1>
        <p class="intro">Choose a coding challenge, practise your skills, and keep your momentum going one small project at a time.</p>

        <?php if ($challenges !== []): ?>
            <section class="challenge-grid" aria-label="Daily challenges">
                <?php foreach ($challenges as $challenge): ?>
                    <a class="challenge-card" href="<?= escape(rawurlencode($challenge['folder'])) ?>/">
                        <span class="folder"><?= escape($challenge['folder']) ?></span>
                        <h2><?= escape($challenge['title']) ?></h2>
                        <p class="objective"><?= escape($challenge['objective']) ?></p>
                        <span class="open-link">Open challenge <span aria-hidden="true">&rarr;</span></span>
                    </a>
                <?php endforeach; ?>
            </section>
        <?php else: ?>
            <p class="empty">No challenge folders with a README.md file were found yet.</p>
        <?php endif; ?>

        <footer>Daily Coding Challenges &middot; Keep learning, keep building.</footer>
    </main>
</body>
</html>

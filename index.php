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
    <style>
        :root {
            color-scheme: dark;
            --background: #08111f;
            --surface: rgba(17, 31, 52, 0.78);
            --surface-hover: rgba(24, 43, 70, 0.94);
            --border: rgba(148, 163, 184, 0.18);
            --text: #f8fafc;
            --muted: #a9b7ca;
            --accent: #55e6c1;
            --accent-two: #60a5fa;
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 15% 0%, rgba(37, 99, 235, 0.24), transparent 34rem),
                radial-gradient(circle at 90% 20%, rgba(45, 212, 191, 0.14), transparent 28rem),
                var(--background);
        }

        .page {
            width: min(1100px, calc(100% - 2rem));
            margin: 0 auto;
            padding: 5rem 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            margin: 0 0 1rem;
            color: var(--accent);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            width: 0.55rem;
            height: 0.55rem;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 1rem var(--accent);
            content: "";
        }

        h1 {
            max-width: 780px;
            margin: 0;
            font-size: clamp(2.5rem, 7vw, 5.2rem);
            line-height: 0.98;
            letter-spacing: -0.055em;
        }

        .intro {
            max-width: 650px;
            margin: 1.5rem 0 3.25rem;
            color: var(--muted);
            font-size: clamp(1rem, 2vw, 1.2rem);
            line-height: 1.7;
        }

        .challenge-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 290px), 1fr));
            gap: 1.15rem;
        }

        .challenge-card {
            position: relative;
            display: flex;
            min-height: 260px;
            flex-direction: column;
            padding: 1.65rem;
            overflow: hidden;
            color: inherit;
            text-decoration: none;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 1.25rem;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(14px);
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .challenge-card::after {
            position: absolute;
            right: -4rem;
            bottom: -5rem;
            width: 11rem;
            height: 11rem;
            border-radius: 50%;
            background: var(--accent-two);
            opacity: 0.08;
            filter: blur(5px);
            content: "";
        }

        .challenge-card:hover,
        .challenge-card:focus-visible {
            transform: translateY(-5px);
            background: var(--surface-hover);
            border-color: rgba(85, 230, 193, 0.5);
            outline: none;
        }

        .folder {
            margin-bottom: 2.2rem;
            color: var(--accent);
            font: 700 0.78rem/1 ui-monospace, SFMono-Regular, Menlo, monospace;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .challenge-card h2 {
            margin: 0 0 0.85rem;
            font-size: 1.35rem;
            line-height: 1.25;
            letter-spacing: -0.025em;
        }

        .objective {
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
        }

        .open-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: auto;
            padding-top: 1.5rem;
            color: var(--text);
            font-size: 0.9rem;
            font-weight: 750;
        }

        .open-link span { transition: transform 180ms ease; }
        .challenge-card:hover .open-link span { transform: translateX(4px); }

        .empty {
            padding: 2rem;
            color: var(--muted);
            border: 1px dashed var(--border);
            border-radius: 1rem;
        }

        footer {
            margin-top: 3rem;
            color: #718096;
            font-size: 0.85rem;
        }

        @media (max-width: 560px) {
            .page { padding: 3.25rem 0; }
            .intro { margin-bottom: 2.25rem; }
            .challenge-card { min-height: 235px; }
        }
    </style>
</head>
<body>
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

<?php

$results = [
  [
    "genre" => "Science Fiction",
    "books_finished" => 2,
    "total_pages" => 908,
    "average_rating" => 4.8
  ],
  [
    "genre" => "Fantasy",
    "books_finished" => 2,
    "total_pages" => 515,
    "average_rating" => 4.5
  ]
];

$solutionCode = <<<'SQL'
SELECT
    genre,
    COUNT(title) AS books_finished,
    SUM(pages) AS total_pages,
    ROUND(AVG(rating), 1) AS average_rating
FROM reading_list
WHERE finished = TRUE
GROUP BY genre
HAVING COUNT(*) >= 2
ORDER BY average_rating DESC;
SQL;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Daily Challenges: Day 7 - PostgreSQL</title>
  <link rel="stylesheet" href="../assets/css/combined.min.css">

</head>
<body class="challenge-page">

  <header>

    <h1>Daily Challenges: Day 7 - PostgreSQL</h1>

    <p><strong>Estimated time</strong>: 30 minutes</p>
    <p><strong>Level</strong>: Beginner–intermediate</p>
    <p>
      <strong>Objective</strong>:
      Practise grouping rows with GROUP BY and filtering grouped results with HAVING.
    </p>

  </header>

  <main>

    <hr />

    <section>

      <h2>Finished Books by Genre</h2>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Genre</th>
              <th>Books Finished</th>
              <th>Total Pages</th>
              <th>Average Rating</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $result): ?>
              <tr>
                <td><?php echo htmlspecialchars($result["genre"]); ?></td>
                <td><?php echo $result["books_finished"]; ?></td>
                <td><?php echo $result["total_pages"]; ?></td>
                <td><?php echo number_format($result["average_rating"], 1); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </section>

    <hr />

    <section>

      <h3>PostgreSQL Solution</h3>

      <pre><code><?php echo htmlspecialchars($solutionCode); ?></code></pre>

    </section>

  </main>

  <footer>

    <p>Coding Challenge - Day 7</p>

  </footer>

</body>
</html>

<?php

$result = [
  "finished_count" => 3,
  "total_pages" => 914,
  "average_pages" => 305
];

$solutionCode = <<<'SQL'
SELECT
    COUNT(title) AS finished_count,
    SUM(pages) AS total_pages,
    ROUND(AVG(pages)) AS average_pages
FROM reading_list
WHERE finished = TRUE;
SQL;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Daily Challenges: Day 6 - PostgreSQL</title>
  <link rel="stylesheet" href="../assets/css/combined.min.css">

</head>
<body class="challenge-page">

  <header>

    <h1>Daily Challenges: Day 6 - PostgreSQL</h1>

    <p><strong>Estimated time</strong>: 30 minutes</p>
    <p><strong>Level</strong>: Beginner</p>
    <p>
      <strong>Objective</strong>:
      Practise filtering and aggregate functions in PostgreSQL.
    </p>

  </header>

  <main>

    <hr />

    <section>

      <h2>Finished Reading Summary</h2>

      <div class="basket-summary">
        <div class="summary-item">
          <span>Finished Books</span>
          <strong><?php echo $result["finished_count"]; ?></strong>
        </div>

        <div class="summary-item">
          <span>Total Pages</span>
          <strong><?php echo $result["total_pages"]; ?></strong>
        </div>

        <div class="summary-item">
          <span>Average Pages</span>
          <strong><?php echo $result["average_pages"]; ?></strong>
        </div>
      </div>

    </section>

    <hr />

    <section>

      <h3>PostgreSQL Solution</h3>

      <pre><code><?php echo htmlspecialchars($solutionCode); ?></code></pre>

    </section>

  </main>

  <footer>

    <p>Coding Challenge - Day 6</p>

  </footer>

</body>
</html>

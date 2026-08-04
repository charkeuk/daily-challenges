<?php

$results = [
  [
    "member_name" => "Aisha",
    "book_title" => "Dune",
    "due_date" => "2026-07-30",
    "status" => "Overdue",
    "overdue_days" => 5
  ],
  [
    "member_name" => "Ben",
    "book_title" => "The Hobbit",
    "due_date" => "2026-08-10",
    "status" => "On time",
    "overdue_days" => 0
  ]
];

$solutionCode = <<<'SQL'
SELECT
    m.name AS member_name,
    b.title AS book_title,
    l.due_date,
    CASE
        WHEN l.due_date < DATE '2026-08-04' THEN 'Overdue'
        ELSE 'On time'
    END AS status,
    GREATEST(DATE '2026-08-04' - l.due_date, 0) AS overdue_days
FROM loans AS l
JOIN members AS m ON m.id = l.member_id
JOIN books AS b ON b.id = l.book_id
WHERE l.returned_at IS NULL
ORDER BY
    (l.due_date < DATE '2026-08-04') DESC,
    l.due_date ASC,
    m.name ASC;
SQL;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Daily Challenges: Day 4 - PostgreSQL</title>
  <link rel="stylesheet" href="../assets/css/combined.min.css">

</head>
<body class="challenge-page">

  <header>

    <h1>Daily Challenges: Day 4 - PostgreSQL</h1>

    <p><strong>Estimated time</strong>: 30 minutes</p>
    <p><strong>Level</strong>: Beginner, slightly harder</p>
    <p>
      <strong>Objective</strong>:
      Practise joins, date arithmetic, CASE, filtering, and sorting.
    </p>

  </header>

  <main>

    <hr />

    <section>

      <h2>Active Library Loans Report</h2>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Member</th>
              <th>Book</th>
              <th>Due Date</th>
              <th>Status</th>
              <th>Days Overdue</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $result): ?>
              <tr>
                <td><?php echo htmlspecialchars($result["member_name"]); ?></td>
                <td><?php echo htmlspecialchars($result["book_title"]); ?></td>
                <td><?php echo htmlspecialchars($result["due_date"]); ?></td>
                <td class="<?php echo $result["status"] === "Overdue" ? "status-overdue" : "status-on-time"; ?>">
                  <?php echo htmlspecialchars($result["status"]); ?>
                </td>
                <td><?php echo $result["overdue_days"]; ?></td>
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

    <p>Coding Challenge - Day 4</p>

  </footer>

</body>
</html>

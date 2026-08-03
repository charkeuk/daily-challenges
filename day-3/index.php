<?php

$loan = [
  "title" => "The Hobbit",
  "daysBorrowed" => 21,
  "allowedDays" => 14,
  "dailyRate" => 0.35
];

function checkLoan(array $loan): array {

  $title = $loan["title"];
  $daysBorrowed = $loan["daysBorrowed"];
  $allowedDays = $loan["allowedDays"];
  $dailyRate = $loan["dailyRate"];

  $overdueDays = max(0, $daysBorrowed - $allowedDays);
  $fee = $overdueDays * $dailyRate;

  if($overdueDays === 0) {
    $status = "On time";
  } else {
    $status = "Overdue";
  }

  return [
    "title" => $title,
    "status" => $status,
    "overdueDays" => $overdueDays,
    "fee" => round(min($fee, 10), 2)
  ];

}

$result = checkLoan($loan);

$solutionCode = <<<'PHP'
$loan = [
  "title" => "The Hobbit",
  "daysBorrowed" => 21,
  "allowedDays" => 14,
  "dailyRate" => 0.35
];

function checkLoan(array $loan): array {

  $title = $loan["title"];
  $daysBorrowed = $loan["daysBorrowed"];
  $allowedDays = $loan["allowedDays"];
  $dailyRate = $loan["dailyRate"];

  $overdueDays = max(0, $daysBorrowed - $allowedDays);
  $fee = $overdueDays * $dailyRate;

  if($overdueDays === 0) {
    $status = "On time";
  } else {
    $status = "Overdue";
  }

  return [
    "title" => $title,
    "status" => $status,
    "overdueDays" => $overdueDays,
    "fee" => round(min($fee, 10), 2)
  ];

}

$result = checkLoan($loan);
PHP;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Daily Challenges: Day 3 - PHP</title>
  <link rel="stylesheet" href="../assets/css/combined.min.css">

</head>
<body class="challenge-page">

  <header>

    <h1>Daily Challenges: Day 3 - PHP</h1>

    <p><strong>Estimated time</strong>: 30 minutes</p>
    <p><strong>Level</strong>: Beginner, slightly harder</p>
    <p>
      <strong>Objective</strong>:
      Practise PHP functions, associative arrays, conditionals,
      calculations, and structured return values.
    </p>

  </header>

  <main>

    <hr />

    <section>

      <h2>Library Loan Result</h2>

      <div class="loan-summary">

        <div class="summary-item">
          <span>Book Title</span>

          <strong>
            <?php echo htmlspecialchars($result["title"]); ?>
          </strong>
        </div>

        <div class="summary-item">
          <span>Status</span>

          <strong class="<?php echo $result["status"] === "Overdue" ? "status-overdue" : "status-on-time"; ?>">
            <?php echo htmlspecialchars($result["status"]); ?>
          </strong>
        </div>

        <div class="summary-item">
          <span>Overdue Days</span>

          <strong>
            <?php echo $result["overdueDays"]; ?>
          </strong>
        </div>

        <div class="summary-item">
          <span>Late Fee</span>

          <strong>
            £<?php echo number_format($result["fee"], 2); ?>
          </strong>
        </div>

      </div>

    </section>

    <hr />

    <section>

      <h3>PHP Solution</h3>

      <pre><code><?php echo htmlspecialchars($solutionCode); ?></code></pre>

    </section>

  </main>

  <footer>

    <p>Coding Challenge - Day 3</p>

  </footer>

</body>
</html>

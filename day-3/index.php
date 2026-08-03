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

  <style>

    body {
      max-width: 1000px;
      margin: 0 auto;
      padding: 40px 20px;
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #222;
      background: #f5f5f5;
    }

    header,
    main,
    footer {
      padding: 30px;
      background: #ffffff;
    }

    header {
      border-radius: 12px 12px 0 0;
      padding-bottom: 0;
    }

    header p:last-child {
      margin-bottom: 0;
    }

    main {
      border-radius: 0 0 12px 12px;
    }

    footer {
      margin-top: 20px;
      border-radius: 12px;
      text-align: center;
      color: #666;
    }

    h1,
    h2,
    h3 {
      margin-top: 0;
    }

    hr {
      margin: 30px 0;
      border: 0;
      border-top: 1px solid #ddd;
    }

    .loan-summary {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 16px;
    }

    .summary-item {
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fafafa;
    }

    .summary-item span {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      font-weight: bold;
      color: #666;
    }

    .summary-item strong {
      font-size: 20px;
    }

    .status-on-time {
      color: #137333;
    }

    .status-overdue {
      color: #b3261e;
    }

    pre {
      overflow-x: auto;
      padding: 20px;
      border-radius: 8px;
      background: #1e1e1e;
      color: #f8f8f2;
    }

    code {
      font-family: Monaco, Consolas, monospace;
    }

    @media (max-width: 600px) {

      body {
        padding: 20px 10px;
      }

      header,
      main,
      footer {
        padding: 20px;
      }

      .loan-summary {
        grid-template-columns: 1fr;
      }

    }

  </style>

</head>
<body>

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
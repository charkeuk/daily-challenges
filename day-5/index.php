<?php

$booksJson = '[
	{"title":"Dune","author":"Frank Herbert","available":true},
	{"title":"1984","author":"George Orwell","available":false},
	{"title":"The Hobbit","author":"J.R.R. Tolkien","available":true}
]';

function findAvailableBooks(string $booksJson): array {
  $books = json_decode($booksJson, true);
  
  $availableBooks = [];
  
  foreach ($books as $book) {
    if($book["available"] === true) {
      $availableBooks[] = [
        "title" => $book["title"],
        "author" => $book["author"]
      ];
    }
  }
  
  return [
    "books" => $availableBooks,
    "count" => count($availableBooks)
  ];
}

$result = findAvailableBooks($booksJson);

$solutionCode = <<<'PHP'
$booksJson = '[
  {"title":"Dune","author":"Frank Herbert","available":true},
  {"title":"1984","author":"George Orwell","available":false},
  {"title":"The Hobbit","author":"J.R.R. Tolkien","available":true}
]';

function findAvailableBooks(string $booksJson): array {
  $books = json_decode($booksJson, true);
  
  $availableBooks = [];
  
  foreach ($books as $book) {
    if($book["available"] === true) {
      $availableBooks[] = [
        "title" => $book["title"],
        "author" => $book["author"]
      ];
    }
  }
  
  return [
    "books" => $availableBooks,
    "count" => count($availableBooks)
  ];
}

$result = findAvailableBooks($booksJson);
PHP;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Daily Challenges: Day 5 - PHP + JSON Book Filter</title>
  <link rel="stylesheet" href="../assets/css/combined.min.css">

</head>
<body class="challenge-page">

  <header>

    <h1>Daily Challenges: Day 5 - PHP + JSON Book Filter</h1>

    <p><strong>Estimated time</strong>: 30 minutes</p>
    <p><strong>Level</strong>: Beginner</p>
    <p>
      <strong>Objective</strong>:
      Decode JSON in PHP, loop through arrays, filter records, and return structured data.
    </p>

  </header>

  <main>

    <hr />

    <section>

      <h2>Available Books</h2>

      <div class="loan-summary">

        <div class="summary-item">
          <span>Available Book Count</span>

          <strong>
            <?php echo $result["count"]; ?>
          </strong>
        </div>

      </div>

      <hr />

      <h3>Available Book List</h3>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result["books"] === []): ?>
              <tr>
                <td colspan="2">No books are currently available.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($result["books"] as $book): ?>
                <tr>
                  <td><?php echo htmlspecialchars($book["title"]); ?></td>
                  <td><?php echo htmlspecialchars($book["author"]); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </section>

    <hr />

    <section>

      <h3>PHP Solution</h3>

      <pre><code><?php echo htmlspecialchars($solutionCode); ?></code></pre>

    </section>

  </main>

  <footer>

    <p>Coding Challenge - Day 5</p>

  </footer>

</body>
</html>

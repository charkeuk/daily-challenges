# Daily Challenge 5: PHP + JSON Book Filter

**Estimated time**: 30 minutes

**Level**: Beginner

**Objective**: Decode JSON in PHP, loop through arrays, filter records, and return structured data.

---
Create this function:
```php
function findAvailableBooks(string $booksJson): array
```

Use this input:
```php
$booksJson = '[
  {"title":"Dune","author":"Frank Herbert","available":true},
  {"title":"1984","author":"George Orwell","available":false},
  {"title":"The Hobbit","author":"J.R.R. Tolkien","available":true}
]';
```
---
Requirements:
* Decode the JSON into a PHP associative array.
* Find books whose available value is true.
* Store each matching book’s title and author.
* Return an array containing:
  * books: the matching books
  * count: the number of matching books
* Do not print from inside the function.
* Handle an input where no books are available.

Expected result:
```php
[
  "books" => [
    ["title" => "Dune", "author" => "Frank Herbert"],
    ["title" => "The Hobbit", "author" => "J.R.R. Tolkien"]
  ],
  "count" => 2
]
```

Completion criteria:
* Uses `json_decode()` rather than manually recreating the data.
* Filtering is performed by your code.
* Unavailable books are excluded.
* The count matches the filtered list.
* An input with no available books returns an empty books array and a count of 0.

---
**Small hint**: Pass `true` as the second argument to `json_decode()` so each book becomes an associative array.
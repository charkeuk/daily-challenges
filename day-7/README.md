# Daily Challenge 7: PostgreSQL GROUP BY + HAVING

**Estimated time**: 30 minutes

**Level**: Beginner–intermediate

**Objective**: Practise grouping rows with `GROUP BY` and filtering grouped results with `HAVING`.

---

Create and populate the `reading_list` table using the files in `database/migrations` and `database/seeds`.

Write one PostgreSQL query that:

1. Includes only finished books.
2. Groups the books by `genre`.
3. Returns `genre`, the number of finished books as `books_finished`, total pages as `total_pages`, and the average rating rounded to one decimal place as `average_rating`.
4. Includes only genres with at least two finished books.
5. Orders the results by `average_rating` from highest to lowest.

---

**Expected output**:

| genre | books_finished | total_pages | average_rating |
|---|---:|---:|---:|
| Science Fiction | 2 | 908 | 4.8 |
| Fantasy | 2 | 515 | 4.5 |

**Completion criteria**:

* Finished books are selected using `WHERE`.
* Results are grouped by genre using `GROUP BY`.
* `COUNT`, `SUM`, `AVG`, and `ROUND` calculate the summary values.
* Groups with fewer than two finished books are excluded using `HAVING`.
* Results are ordered by average rating from highest to lowest.

---

**Optional hints**:

* `WHERE` filters individual rows before grouping.
* `HAVING` filters the groups produced by `GROUP BY`.
* Build the grouped report first, then add the `HAVING` condition.

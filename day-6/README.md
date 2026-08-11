# Daily Challenge 6: PostgreSQL Filtering + Aggregate Functions

**Estimated time**: 30 minutes

**Level**: Beginner

**Objective**: Practise PostgreSQL filtering and aggregate functions without joins or complex date logic.

---
**Create and populate this table**:
```sql
CREATE TABLE reading_list (
  id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  title TEXT NOT NULL,
  pages INTEGER NOT NULL,
  finished BOOLEAN NOT NULL
);

INSERT INTO reading_list (title, pages, finished) VALUES
  ('Dune', 412, TRUE),
  ('1984', 328, FALSE),
  ('The Hobbit', 310, TRUE),
  ('Coraline', 192, TRUE);
```
Write *one PostgreSQL query* that summarizes only the finished books.

Your result must contain these exact column aliases:
* `finished_count`
* `total_pages`
* `average_pages`
Round `average_pages` to the nearest whole number.

---
**Expected output**:
| finished_count | total_pages | average_pages |
|----------------|-------------|---------------|
| 3              | 914         | 305           |

**Completion criteria**:
* Unfinished books are excluded using `WHERE`.
* `COUNT`, `SUM`, and `AVG` calculate the values.
* The average is rounded by PostgreSQL.
* The result is produced by one query.
* The query continues working when more books are inserted.

---
**Optional hints**:
* Begin with `SELECT` and the three aggregate functions.
* Filter rows before PostgreSQL calculates the aggregates.
* `ROUND()` can wrap another function.
# Daily Challenge 4: PostgreSQL Active Library Loans Report

**Estimated time**: 30 minutes

**Level**: Beginner, slightly harder

**Objective**: Practise joins, date arithmetic, `CASE`, filtering, aliases, and sorting in PostgreSQL.

---

Write a PostgreSQL query that produces a report of every library loan that has not yet been returned.

The database contains three tables:

```text
members
├── id
└── name

books
├── id
└── title

loans
├── id
├── member_id
├── book_id
├── due_date
└── returned_at
```

The `loans.member_id` column refers to `members.id`, and `loans.book_id` refers to `books.id`.

Use the migrations and seed data in the [`database`](database/) directory to build the challenge database.

---

Your report must:

1. Include only loans whose `returned_at` value is `NULL`.
2. Join each loan to its member and book.
3. Return these columns with the exact aliases shown:
   - `member_name`
   - `book_title`
   - `due_date`
   - `status`
   - `overdue_days`
4. Set `status` to `Overdue` when the due date is before the report date; otherwise, set it to `On time`.
5. Calculate how many days overdue the loan is.
6. Return `0` for `overdue_days` when a loan is not overdue—never return a negative number.
7. Sort overdue loans first, followed by the earliest due date and then the member name.

Use `DATE '2026-08-04'` as the report date so your result is repeatable.

For the supplied seed data, the result should contain:

| member_name | book_title | due_date | status | overdue_days |
| --- | --- | --- | --- | ---: |
| Aisha | Dune | 2026-07-30 | Overdue | 5 |
| Ben | The Hobbit | 2026-08-10 | On time | 0 |

The returned copy of *1984* must not appear in the report.

---

#### Completion criteria

* The result is produced by one SQL query.
* Both relationships are joined using their matching ID columns.
* Returned loans are excluded using `IS NULL`.
* `CASE` is used to calculate the status.
* PostgreSQL date arithmetic is used to calculate overdue days.
* Column aliases and sorting match the requirements.
* The query still works when more members, books, and loans are added.

**Optional hint**: Start with `loans`, join the other two tables, and get the active-loan rows correct before adding the calculated columns and ordering.

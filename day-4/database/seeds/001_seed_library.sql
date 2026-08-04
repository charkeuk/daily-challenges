INSERT INTO members (id, name)
OVERRIDING SYSTEM VALUE
VALUES
    (1, 'Aisha'),
    (2, 'Ben');

INSERT INTO books (id, title)
OVERRIDING SYSTEM VALUE
VALUES
    (1, 'Dune'),
    (2, 'The Hobbit'),
    (3, '1984');

INSERT INTO loans (id, member_id, book_id, due_date, returned_at)
OVERRIDING SYSTEM VALUE
VALUES
    (1, 1, 1, '2026-07-30', NULL),
    (2, 2, 2, '2026-08-10', NULL),
    (3, 1, 3, '2026-07-20', '2026-07-18');

SELECT setval(pg_get_serial_sequence('members', 'id'), MAX(id), true)
FROM members;

SELECT setval(pg_get_serial_sequence('books', 'id'), MAX(id), true)
FROM books;

SELECT setval(pg_get_serial_sequence('loans', 'id'), MAX(id), true)
FROM loans;

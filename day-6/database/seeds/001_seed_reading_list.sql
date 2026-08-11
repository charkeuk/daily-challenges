INSERT INTO reading_list (id, title, pages, finished)
OVERRIDING SYSTEM VALUE
VALUES
    (1, 'Dune', 412, TRUE),
    (2, '1984', 328, FALSE),
    (3, 'The Hobbit', 310, TRUE),
    (4, 'Coraline', 192, TRUE);

SELECT setval(pg_get_serial_sequence('reading_list', 'id'), MAX(id), true)
FROM reading_list;

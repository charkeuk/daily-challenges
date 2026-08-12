INSERT INTO reading_list (id, title, genre, pages, rating, finished)
OVERRIDING SYSTEM VALUE
VALUES
    (1, 'Dune', 'Science Fiction', 412, 4.8, TRUE),
    (2, 'Project Hail Mary', 'Science Fiction', 496, 4.7, TRUE),
    (3, 'Neuromancer', 'Science Fiction', 271, 3.9, FALSE),
    (4, 'The Hobbit', 'Fantasy', 310, 4.6, TRUE),
    (5, 'A Wizard of Earthsea', 'Fantasy', 205, 4.4, TRUE),
    (6, 'The Name of the Wind', 'Fantasy', 662, 4.1, FALSE),
    (7, 'The Silent Patient', 'Thriller', 336, 3.8, TRUE),
    (8, 'Gone Girl', 'Thriller', 422, 4.2, FALSE),
    (9, 'Educated', 'Memoir', 334, 4.5, TRUE);

SELECT setval(pg_get_serial_sequence('reading_list', 'id'), MAX(id), true)
FROM reading_list;

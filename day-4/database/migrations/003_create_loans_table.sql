CREATE TABLE loans (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    member_id INTEGER NOT NULL REFERENCES members (id),
    book_id INTEGER NOT NULL REFERENCES books (id),
    due_date DATE NOT NULL,
    returned_at DATE
);

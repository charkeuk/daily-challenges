# Day 4 database

The migrations and seeds in this directory are the source of truth for the challenge database.

## Layout

```text
database/
├── migrations/
│   ├── 001_create_members_table.sql
│   ├── 002_create_books_table.sql
│   └── 003_create_loans_table.sql
└── seeds/
    └── 001_seed_library.sql
```

Migrations define structural changes and are kept in the order they were introduced. Seeds contain sample data and run after all migrations.

## Build from scratch

Create the `daily_challenge_04` database, then run these files in order:

1. `migrations/001_create_members_table.sql`
2. `migrations/002_create_books_table.sql`
3. `migrations/003_create_loans_table.sql`
4. `seeds/001_seed_library.sql`

From DataGrip on the host machine, connect with `localhost` and the host PostgreSQL port from `_docker/.env` (currently `8001`).

From PHP inside Docker, use the values in `day-4/.env`: the host is `postgres` and the port is PostgreSQL's container port, `5432`.

When the database structure changes, add the next numbered migration instead of editing migrations that have already been applied. Do not add `ALTER ... OWNER` statements; keeping migrations independent of the local PostgreSQL username makes them portable.

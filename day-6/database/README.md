# Day 6 database

The migration and seed in this directory are the source of truth for the challenge database.

## Layout

```text
database/
├── migrations/
│   └── 001_create_reading_list_table.sql
└── seeds/
    └── 001_seed_reading_list.sql
```

Migrations define structural changes and run before seeds. Seeds contain the sample data used by the challenge.

## Build from scratch

Create the `daily_challenge_06` database, then run these files in order:

1. `migrations/001_create_reading_list_table.sql`
2. `seeds/001_seed_reading_list.sql`

From DataGrip on the host machine, connect with `localhost` and the host PostgreSQL port from `_docker/.env` (currently `8001`).

From PHP inside Docker, use the values in `day-6/.env`: the host is `postgres` and the port is PostgreSQL's container port, `5432`.

When the database structure changes, add the next numbered migration instead of editing migrations that have already been applied. Do not add `ALTER ... OWNER` statements; keeping migrations independent of the local PostgreSQL username makes them portable.

<?php
$db = new SQLite3('database.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

$db->exec('CREATE TABLE IF NOT EXISTS "users"(
    "id" INTEGER PRIMARY KEY,
    "name" TEXT
)');

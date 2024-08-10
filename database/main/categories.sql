create table categories
(
    id         integer    not null
        primary key autoincrement,
    name       varchar    not null,
    sort_order integer    not null,
    status     tinyint(1) not null,
    deleted_at datetime,
    created_at datetime,
    updated_at datetime
);


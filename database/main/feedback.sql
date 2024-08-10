create table feedback
(
    id                  integer not null
        primary key autoincrement,
    service_provider_id integer not null,
    rate                integer not null,
    comment             text    not null,
    deleted_at          datetime,
    created_at          datetime,
    updated_at          datetime
);


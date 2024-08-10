create table bookings
(
    id                  integer                not null
        primary key autoincrement,
    service_date        datetime               not null,
    service_time        time                   not null,
    service_provider_id integer                not null
        references users,
    address             varchar                not null,
    city                varchar                not null,
    phone               varchar                not null,
    status              tinyint(1) default '0' not null,
    description         text,
    deleted_at          datetime,
    created_at          datetime,
    updated_at          datetime
);


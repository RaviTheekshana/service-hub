create table profile__management
(
    id                  integer not null
        primary key autoincrement,
    service_provider_id integer not null,
    service_description text    not null,
    work_details        varchar not null,
    experience_years    integer not null,
    hourly_rate         double  not null,
    deleted_at          datetime,
    created_at          datetime,
    updated_at          datetime
);


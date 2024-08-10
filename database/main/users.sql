create table users
(
    id                        integer                    not null
        primary key autoincrement,
    name                      varchar                    not null,
    email                     varchar                    not null,
    phone                     varchar                    not null,
    email_verified_at         datetime,
    password                  varchar                    not null,
    remember_token            varchar,
    current_team_id           integer,
    profile_photo_path        varchar,
    created_at                datetime,
    updated_at                datetime,
    two_factor_secret         text,
    two_factor_recovery_codes text,
    two_factor_confirmed_at   datetime,
    role                      varchar default 'customer' not null,
    category_id               integer
        references categories
            on delete cascade
);

create unique index users_email_unique
    on users (email);

create unique index users_phone_unique
    on users (phone);


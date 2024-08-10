create table team_user
(
    id         integer not null
        primary key autoincrement,
    team_id    integer not null,
    user_id    integer not null,
    role       varchar,
    created_at datetime,
    updated_at datetime
);

create unique index team_user_team_id_user_id_unique
    on team_user (team_id, user_id);


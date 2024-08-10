create table teams
(
    id            integer    not null
        primary key autoincrement,
    user_id       integer    not null,
    name          varchar    not null,
    personal_team tinyint(1) not null,
    created_at    datetime,
    updated_at    datetime
);

create index teams_user_id_index
    on teams (user_id);


create table team_invitations
(
    id         integer not null
        primary key autoincrement,
    team_id    integer not null
        references teams
            on delete cascade,
    email      varchar not null,
    role       varchar,
    created_at datetime,
    updated_at datetime
);

create unique index team_invitations_team_id_email_unique
    on team_invitations (team_id, email);


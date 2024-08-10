create table messages
(
    id               integer not null
        primary key autoincrement,
    sender_user_Id   integer not null,
    receiver_user_Id integer not null,
    message_content  text    not null,
    deleted_at       datetime,
    created_at       datetime,
    updated_at       datetime
);


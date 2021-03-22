\c postgres;
DROP DATABASE log;
CREATE DATABASE log;
\c log;

CREATE TABLE user_details (
    user_id serial primary key,
    user_email varchar(50) not null,
    user_password varchar(100) not null,
    user_name varchar(200) not null,
    user_type varchar(20)
);

INSERT INTO user_details (user_email, user_password, user_name, user_type) VALUES('example@example.com', '$2y$10$cHpf3TzonURXDENRiRF0de1ycSfnM4NJ27sdwyUCf5L.sewDlkCBe', 'John', 'master');

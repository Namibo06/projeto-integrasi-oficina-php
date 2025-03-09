use db_user_register;

CREATE TABLE IF NOT EXISTS tb_user(
    id INT AUTO_INCREMENT,
    user_name VARCHAR(60) NOT NULL,
    user_email VARCHAR(64) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS tb_user;
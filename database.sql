CREATE TABLE users (
    id      int(255)    auto_increment not null,
    role    varchar(255),
    name    varchar(255) not null,
    surname varchar(255),
    nick    varchar(255),
    email   varchar(255),
    password varchar(255) not null,
    image   varchar(255),
    created_at datetime,
    updated_at datetime,
    remember_token varchar(255),
    CONSTRAINT pk_users PRIMARY KEY (id)
);

INSERT INTO users VALUES(null, user, 'sergio', 'rios', 'sr', 'sergioriosp04@gmail.com', '1036400564', null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(null, user, 'jorge', 'rios', 'sr', 'jorge@gmail.com', '1036400564', null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(null, user, 'olga', 'rios', 'sr', 'olga@gmail.com', '1036400564', null, CURTIME(), CURTIME(), NULL);


CREATE TABLE images (
    id      int(255)    auto_increment not null,
    user_id int(255),
    image_path varchar(255),
    description text,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_image PRIMARY KEY (id),
    CONSTRAINT fk_images_users FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO images VALUES(null, 1, 'text.jpg', 'descripcion de prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(null, 2, 'playa.jpg', 'descripcion de prueba 2', CURTIME(), CURTIME());
INSERT INTO images VALUES(null, 3, 'arena.jpg', 'descripcion de prueba 3', CURTIME(), CURTIME());
INSERT INTO images VALUES(null, 3, 'familia.jpg', 'descripcion de prueba 4', CURTIME(), CURTIME());

CREATE TABLE comments(
    id      int(255)    auto_increment not null,
    user_id int(255),
    image_id int(255),
    content text,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_comments PRIMARY KEY (id),
    CONSTRAINT fk_comments_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY (image_id) REFERENCES images(id)
);

INSERT INTO comments VALUES(null, 1, 4, 'genial', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 3, 'chevere', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 3, 2, 'chevere igual', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 3, 1, 'jaja', CURTIME(), CURTIME());

CREATE TABLE likes(
    id      int(255)    auto_increment not null,
    user_id int(255),
    image_id int(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_likes PRIMARY KEY (id),
    CONSTRAINT fk_likes_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY (image_id) REFERENCES images(id)
);

INSERT INTO likes VALUES(null, 1, 2,CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 1, 3,CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 2, 3,CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 3, 1,CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 1, 4,CURTIME(), CURTIME());

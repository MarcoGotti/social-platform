## users

- id | INT(10) unsigned PK AI
- username | VARCHAR(30) UQ NN
- password | VARCHAR(30) NN
- name | VARCHAR (30) NN
- lastname | VARCHAR (30) NN
- birthdate | DATE NULL
- email | VARCHAR (50) UQ NN
- registration_date | DATETIME DEFAULT(CURRENT_TIMESTAMP)

## posts

- id | BIGINT(15) unsigned PK AI
- user_id | INT(10) unsigned MU
- title | VARCHAR (255) NN
- body | VARCHAR (255) NULL
- publishing_date | DATETIME DEFAULT(CURRENT_TIMESTAMP)

## medias

- id | BIGINT(15) unsigned PK AI
- type | ENUM('photo', 'video')
- path | VARCHAR (255) NN
- caption | VARCHAR (255) NULL

## media_post (pivot)

- post_id | BIGINT(15) unsigned MU
- media_id | BIGINT(15) unsigned MU

## tags

- id | TINYINT unsigned PK AI
- cathegory | VARCHAR(15)

## post_tag (pivot)

- tag_id | TINYINT unsigned MU
- post_id | BIGINT(15) unsigned MU

## likes (pivot)

- post_id | BIGINT(15) unsigned MU
- user_id | INT(10) unsigned MU
- date | DATETIME DEFAULT(CURRENT_TIMESTAMP)

## comments

- id | BIGINT(20) unsigned PK AI
- post_id | BIGINT(15) unsigned MU
- user_id | INT(10) unsigned MU
- text | TEXT
- publishing_date | DATETIME DEFAULT(CURRENT_TIMESTAMP)

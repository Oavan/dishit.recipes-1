use dishit_dev;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    admin BOOLEAN DEFAULT FALSE,
    created DATETIME,
    modified DATETIME
);
INSERT INTO users VALUES (1,'testuser','test@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc','false',NOW(),NOW());
INSERT INTO users VALUES (2,'testadmin','testadmin@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc','true',NOW(),NOW());
# passwords are encoded with SHA1 -> test123


CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255),
    slug VARCHAR(191),
    description TEXT,
    ingredients TEXT,
    directions TEXT,
    approved BOOLEAN DEFAULT FALSE,
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (slug),
    FOREIGN KEY recipe_author (user_id) REFERENCES users(id) ON UPDATE CASCADE  ON DELETE CASCADE
) CHARSET=utf8mb4;
INSERT INTO recipes VALUES (1,1,'Test Recipe','test-recipe','This is a test recipe','1 cup of test','Boil test','TRUE',NOW(),NOW());
INSERT INTO recipes VALUES (2,1,'Second Test Recipe','sec-test-recipe','This is another test recipe','1 cup of test','Boil some more test','TRUE',NOW(),NOW());

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    recipe_id INT,
    comment TEXT,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY comment_author (user_id) REFERENCES users(id) ON UPDATE CASCADE  ON DELETE CASCADE,
    FOREIGN KEY comment_recipe (recipe_id) REFERENCES recipes(id) ON UPDATE CASCADE  ON DELETE CASCADE
) CHARSET=utf8mb4;
INSERT INTO comments VALUES (1,1,1,'This recipe is amazing!',NOW(),NOW());
INSERT INTO comments VALUES (2,2,1,'I concur. The best!',NOW(),NOW());
INSERT INTO comments VALUES (3,2,2,'This is not so good',NOW(),NOW());
INSERT INTO comments VALUES (4,1,2,'I disagree. I love it!',NOW(),NOW());

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    recipe_id INT,
    rating INT,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY user_rating (user_id) REFERENCES users(id) ON UPDATE CASCADE  ON DELETE CASCADE,
    FOREIGN KEY recipe_rating (recipe_id) REFERENCES recipes(id) ON UPDATE CASCADE  ON DELETE CASCADE
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE recipecategories(
    recipe_id INT,
    category_id INT,
    PRIMARY KEY (recipe_id,category_id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
use dishit;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    admin BOOLEAN DEFAULT FALSE,
    created DATETIME,
    modified DATETIME
);
INSERT INTO users VALUES (1,'joe','dishit@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',true,NOW(),NOW());
INSERT INTO users VALUES (2,'cooluser','cooluser@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
INSERT INTO users VALUES (3,'meanuser','meanuser@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
INSERT INTO users VALUES (4,'saduser','saduser@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
INSERT INTO users VALUES (5,'tenbite','tenbite@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
INSERT INTO users VALUES (6,'kai','kai@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
INSERT INTO users VALUES (7,'nammy','nammy@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
INSERT INTO users VALUES (8,'dionndra','dionndra@urbanlmbrjck.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc',false,NOW(),NOW());
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
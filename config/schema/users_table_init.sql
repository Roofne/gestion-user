USE cake_cms;
DROP TABLE users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);

INSERT INTO users (nom, prenom, pseudo, email, password, created, modified)
VALUES
('john','doe','jojo','cakephp@example.com', 'secret', NOW(), NOW());
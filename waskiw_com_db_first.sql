CREATE TABLE userInfo (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(75),
    lastname VARCHAR(75),
    height INT,
    age INT,
    gender VARCHAR(50)
);

CREATE TABLE userPass (
    id INT PRIMARY KEY,
    username VARCHAR(75),
    password VARCHAR(50)
);


ALTER TABLE userPass
ADD userId int;

ALTER TABLE userPass
ADD FOREIGN KEY (userId) REFERENCES userInfo(id);


DROP TABLE userPass;
DROP TABLE userInfo;
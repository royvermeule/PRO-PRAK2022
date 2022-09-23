use Magazijn;

CREATE TABLE User (
  id int PRIMARY KEY AUTO_INCREMENT,
  email varchar(32) NOT NULL,
  password varchar(60) NOT NULL,
  userrole ENUM ('superuser', 'magazijnbeheerder', 'finacieelbeheerder', 'docent', 'student') NOT NULL
);

CREATE TABLE Article (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(32) NOT NULL,
  description varchar(255) NOT NULL,
  price float NOT NULL,
  categoryId int
);

CREATE TABLE Category (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(32) NOT NULL,
  parentId int
);

CREATE TABLE Warehouse (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(32) NOT NULL,
  userId int NOT NULL
);

CREATE TABLE WarehouseAcademy (
  warehouseId int NOT NULL, 
  academyId int NOT NULL
);

CREATE TABLE Academy (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(32) NOT NULL,
  locationId int NOT NULL
);

CREATE TABLE Location (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(32) NOT NULL
);

CREATE TABLE Storage (
  id int PRIMARY KEY AUTO_INCREMENT,
  warehouseId int NOT NULL,
  articleId int NOT NULL,
  amount int NOT NULL
);

CREATE TABLE Orders (
  id int PRIMARY KEY AUTO_INCREMENT,
  userId int NOT NULL,
  warehouseId int NOT NULL,
  accepted boolean NOT NULL DEFAULT false
);

CREATE TABLE OrderArticle (
  orderId int NOT NULL,
  articleId int NOT NULL,
  amount int NOT NULL DEFAULT 1
);

CREATE TABLE Requests (
  id int PRIMARY KEY AUTO_INCREMENT,
  warehouseId int NOT NULL,
  returnDate date NOT NULL
);

CREATE TABLE RequestArticle (
  id int PRIMARY KEY AUTO_INCREMENT,
  requestId int NOT NULL,
  articleId int NOT NULL,
  amount int NOT NULL DEFAULT 1
);

ALTER TABLE Article ADD FOREIGN KEY (categoryId) REFERENCES Category (id);

ALTER TABLE Category ADD FOREIGN KEY (parentId) REFERENCES Category (id);

ALTER TABLE Warehouse ADD FOREIGN KEY (userId) REFERENCES User (id);

ALTER TABLE WarehouseAcademy ADD FOREIGN KEY (warehouseId) REFERENCES Warehouse (id);

ALTER TABLE WarehouseAcademy ADD FOREIGN KEY (academyId) REFERENCES Academy (id);

ALTER TABLE Academy ADD FOREIGN KEY (locationId) REFERENCES Location (id);

ALTER TABLE Storage ADD FOREIGN KEY (warehouseId) REFERENCES Warehouse (id);

ALTER TABLE Storage ADD FOREIGN KEY (articleId) REFERENCES Article (id);

ALTER TABLE Orders ADD FOREIGN KEY (userId) REFERENCES User (id);

ALTER TABLE Orders ADD FOREIGN KEY (warehouseId) REFERENCES Warehouse (id);

ALTER TABLE OrderArticle ADD FOREIGN KEY (orderId) REFERENCES Orders (id);

ALTER TABLE OrderArticle ADD FOREIGN KEY (articleId) REFERENCES Article (id);

ALTER TABLE Requests ADD FOREIGN KEY (warehouseId) REFERENCES Warehouse (id);

ALTER TABLE RequestArticle ADD FOREIGN KEY (requestId) REFERENCES Requests (id);

ALTER TABLE RequestArticle ADD FOREIGN KEY (articleId) REFERENCES Article (id);

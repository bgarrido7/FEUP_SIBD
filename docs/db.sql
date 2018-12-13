
CREATE TABLE locations(
	city VARCHAR PRIMARY KEY,
	x NUMERIC(8,6) NOT NULL,
	y NUMERIC(8,6) NOT NULL
);

CREATE TABLE users(
	username VARCHAR PRIMARY KEY, 
	password VARCHAR NOT NULL,
    birthday DATE,
    city VARCHAR REFERENCES locations(city) NOT NULL
);

CREATE TABLE projects(
	projectID SERIAL PRIMARY KEY,
	name VARCHAR NOT NULL,
	username VARCHAR REFERENCES users(username) NOT NULL,
	description TEXT,
	image_path TEXT,
	stl_path TEXT NOT NULL,
  	category VARCHAR REFERENCES category(name) NOT NULL
);

CREATE TABLE category(
	name VARCHAR NOT NULL PRIMARY KEY
);

CREATE TABLE comments(
	users VARCHAR REFERENCES users(username) NOT NULL,
	projects SERIAL REFERENCES projects(projectID) NOT NULL,
	text TEXT NOT NULL
);

CREATE TABLE stared(
	users VARCHAR REFERENCES users(username) NOT NULL,
	projects SERIAL REFERENCES projects(projectID) NOT NULL,
	nr INTEGER default 0
);

CREATE TABLE wishlist(
	users VARCHAR REFERENCES users(username) NOT NULL,
	projects SERIAL REFERENCES projects(projectID) NOT NULL
);

INSERT INTO locations (city,x,y) VALUES ('Aveiro',40.638174, -8.650185);
INSERT INTO locations (city,x,y) VALUES ('Beja',38.040248, -7.819459);
INSERT INTO locations (city,x,y) VALUES ('Braga',41.546615, -8.418014);
INSERT INTO locations (city,x,y) VALUES ('Bragança',41.811181, -6.754626);
INSERT INTO locations (city,x,y) VALUES ('Castelo Branco',39.828726, -7.502109);
INSERT INTO locations (city,x,y) VALUES ('Coimbra',40.227257, -8.387346);
INSERT INTO locations (city,x,y) VALUES ('Évora',38.574396, -7.925118);
INSERT INTO locations (city,x,y) VALUES ('Faro',37.032528, -7.960862);
INSERT INTO locations (city,x,y) VALUES ('Guarda',40.510352, -7.297424);
INSERT INTO locations (city,x,y) VALUES ('Leiria',39.751399, -8.825077);
INSERT INTO locations (city,x,y) VALUES ('Lisboa',38.732532, -9.124014);
INSERT INTO locations (city,x,y) VALUES ('Portalegre',39.291318, -7.452232);
INSERT INTO locations (city,x,y) VALUES ('Porto',41.160972, -8.634829);
INSERT INTO locations (city,x,y) VALUES ('Santarém',39.326987, -8.747381);
INSERT INTO locations (city,x,y) VALUES ('Setúbal',38.510534, -8.971701);
INSERT INTO locations (city,x,y) VALUES ('Viana do castelo',41.724302, -8.833359);
INSERT INTO locations (city,x,y) VALUES ('Vila Real',41.290022, -7.721976);
INSERT INTO locations (city,x,y) VALUES ('Viseu',40.655409, -7.927442);

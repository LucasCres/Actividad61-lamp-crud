CREATE TABLE jugadores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    apellido VARCHAR(20) NOT NULL,
    tantos_marcados INT UNSIGNED DEFAULT 0,
    puesto VARCHAR(20) NOT NULL,
    clase VARCHAR(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO jugadores (nombre, apellido, tantos_marcados, puesto, clase)
VALUES ('MEPHISTO', 'ROZCO', 16, '3', 'E2A'),
       ('MERLIN', 'WIZARD', 16, '3', 'E2A'),
       ('MORGANA', 'PENDRAGON', 16, '1', 'E2A'),
       ('MELQUIADES', 'BUHO', 20, '2', 'E2A'),
       ('GIOVANNI', 'BERTUCCIO', 16, '5', 'E2A'),
       ('ANNA', 'KARENINA', 16, '1', 'E2A'),
       ('AL', 'DEGEA', 16, '4', 'E2A'),
       ('ALEPH', 'ONSO', 10, '3', 'E1A'),
       ('OLGA', 'SCOTT', 8, '3', 'E1A'),
       ('PAUVAR', 'ELA', 20, '1', 'E1A'),
       ('MELVIN', 'SQUIRRELS', 20, '1', 'E1A');

SOURCE /home/kaw/dev/mt4/db/db.sql;

SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE DISPOSITIVO; 
TRUNCATE TABLE TIPO; 
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO TIPO (nome) VALUES ('Servidor');
INSERT INTO TIPO (nome) VALUES ('Roteador');
INSERT INTO TIPO (nome) VALUES ('Switch');

INSERT INTO DISPOSITIVO (hostname, ip, tipo_id, fabricante) VALUES ('Teste hostname 1', INET_ATON('127.0.0.1'), 1, 'Fabricante A');
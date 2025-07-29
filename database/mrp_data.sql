USE mrp;

INSERT INTO mrp_products(product, component, quantity) VALUES 
("bicicleta", "roda", 0),
("bicicleta","quadro", 0),
("bicicleta","guidao", 0),
("computador", "gabinete", 0),
("computador","placa_mae", 0),
("computador","memoria_ram", 0),
("produto_teste", "componente_teste", 0)
ON DUPLICATE KEY UPDATE
quantity = VALUES(quantity);

UPDATE mrp_products SET quantity = 10;
UPDATE mrp_products SET quantity = 20 WHERE (name = "roda" OR name = "memoria_ram");
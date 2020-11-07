/* Tabla de usuarios */
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
)

/*Tabla de datos de sensores */
CREATE TABLE sensores (
	id_registro int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	temperatura_relativa varchar(50) 
	humedad_relativa varchar(50)
)

/*Tabla de datos valvula*/
CREATE TABLE valvula (
	id_registro int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fecha_apertura date,
	hora_apertura time,
	duracion number
)

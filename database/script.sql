-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2023-08-08 14:57:42.488

-- tables
-- Table: Drivers
CREATE TABLE Drivers (
    id int  NOT NULL AUTO_INCREMENT,
    identification_card varchar(10)  NOT NULL UNIQUE,
    names varchar(100)  NOT NULL,
    last_names varchar(100)  NOT NULL,
    phone varchar(10)  NOT NULL,
    blood_type varchar(4)  NOT NULL,
    rank_id int  NOT NULL,
    created_by int  NULL,
    created_at TIMESTAMP  NULL,
    updated_by int  NULL,
    updated_at TIMESTAMP  NULL,
    deleted_by int  NULL,
    deleted_at TIMESTAMP  NULL,
    CONSTRAINT Drivers_pk PRIMARY KEY (id)
);

-- Table: Guards
CREATE TABLE Guards (
    id int  NOT NULL AUTO_INCREMENT,
    identification_card varchar(10)  NOT NULL UNIQUE,
    names varchar(100)  NOT NULL,
    last_names varchar(100)  NOT NULL,
    phone varchar(10)  NOT NULL,
    blood_type varchar(4)  NOT NULL,
    password varchar(255)  NOT NULL,
    created_by int  NULL,
    created_at TIMESTAMP  NULL,
    updated_by int  NULL,
    updated_at TIMESTAMP  NULL,
    deleted_by int  NULL,
    deleted_at TIMESTAMP  NULL,
    CONSTRAINT Guards_pk PRIMARY KEY (id)
);

-- Table: Novelties
CREATE TABLE Novelties (
    id int  NOT NULL AUTO_INCREMENT,
    hour datetime  NOT NULL,
    novelty text  NOT NULL,
    Guard_id int  NOT NULL,
    created_by int  NULL,
    created_at TIMESTAMP  NULL,
    updated_by int  NULL,
    updated_at TIMESTAMP  NULL,
    deleted_by int  NULL,
    deleted_at TIMESTAMP  NULL,
    CONSTRAINT Novelties_pk PRIMARY KEY (id)
);

-- Table: Ranks
CREATE TABLE Ranks (
    id int  NOT NULL,
    name varchar(5)  NOT NULL,
    code int  NOT NULL,
    CONSTRAINT Ranks_pk PRIMARY KEY (id)
);

CREATE INDEX INX_Ranks ON Ranks (code);

-- Table: Vehicle_Logs
CREATE TABLE Vehicle_Logs (
    id int  NOT NULL AUTO_INCREMENT,
    departure_time datetime  NOT NULL,
    entry_time datetime  NULL,
    destination varchar(150)  NOT NULL,
    departure_km int  NOT NULL,
    entry_km int  NULL,
    mission text  NOT NULL,
    observation text  NULL,
    GuardsOut_id int  NOT NULL,
    GuardsIn_id int  NULL,
    Vehicle_id int  NOT NULL,
    Driver_id int  NOT NULL,
    created_by int  NULL,
    created_at TIMESTAMP  NULL,
    updated_by int  NULL,
    updated_at TIMESTAMP  NULL,
    deleted_by int  NULL,
    deleted_at TIMESTAMP  NULL,
    CONSTRAINT Vehicle_Logs_pk PRIMARY KEY (id)
);

-- Table: Vehicles
CREATE TABLE Vehicles (
    id int  NOT NULL AUTO_INCREMENT,
    description varchar(255)  NOT NULL,
    plate varchar(8)  NOT NULL ,
    in_university bool  NOT NULL,
    created_by int  NULL,
    created_at TIMESTAMP  NULL,
    updated_by int  NULL,
    updated_at TIMESTAMP  NULL,
    deleted_by int  NULL,
    deleted_at TIMESTAMP  NULL,
    CONSTRAINT Vehicles_pk PRIMARY KEY (id)
);

CREATE INDEX Vehicles_idx_Plate ON Vehicles (plate);

-- Table: pending_tasks
CREATE TABLE pending_tasks (
    id int  NOT NULL AUTO_INCREMENT,
    hour_create datetime  NOT NULL,
    hour_done datetime  NULL,
    pending_task text  NOT NULL,
    task_done bool  NOT NULL,
    userCreate_id int  NOT NULL,
    userDone_id int  NULL,
    observations text  NULL,
    created_by int  NULL,
    created_at TIMESTAMP  NULL,
    updated_by int  NULL,
    updated_at TIMESTAMP  NULL,
    deleted_by int  NULL,
    deleted_at TIMESTAMP  NULL,
    CONSTRAINT pending_tasks_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: Drivers_Degrees (table: Drivers)
ALTER TABLE Drivers ADD CONSTRAINT Drivers_Degrees FOREIGN KEY Drivers_Degrees (rank_id)
    REFERENCES Ranks (id);

-- Reference: Novelties_Guards (table: Novelties)
ALTER TABLE Novelties ADD CONSTRAINT Novelties_Guards FOREIGN KEY Novelties_Guards (Guard_id)
    REFERENCES Guards (id);

-- Reference: Vehicle_Logs_Drivers (table: Vehicle_Logs)
ALTER TABLE Vehicle_Logs ADD CONSTRAINT Vehicle_Logs_Drivers FOREIGN KEY Vehicle_Logs_Drivers (Driver_id)
    REFERENCES Drivers (id);

-- Reference: Vehicle_Logs_Guards Salida (table: Vehicle_Logs)
ALTER TABLE Vehicle_Logs ADD CONSTRAINT Vehicle_Logs_GuardsOut FOREIGN KEY Vehicle_Logs_GuardsOut (GuardsOut_id)
    REFERENCES Guards (id);

-- Reference: Vehicle_Logs_Guards Ingreso (table: Vehicle_Logs)
ALTER TABLE Vehicle_Logs ADD CONSTRAINT Vehicle_Logs_GuardsIn FOREIGN KEY Vehicle_Logs_GuardsIn (GuardsIn_id)
    REFERENCES Guards (id);

-- Reference: Vehicle_Logs_Vehicles (table: Vehicle_Logs)
ALTER TABLE Vehicle_Logs ADD CONSTRAINT Vehicle_Logs_Vehicles FOREIGN KEY Vehicle_Logs_Vehicles (Vehicle_id)
    REFERENCES Vehicles (id);

-- Reference: _Guards (table: pending_tasks) create
ALTER TABLE pending_tasks ADD CONSTRAINT _Guards_create FOREIGN KEY _Guards_create (userCreate_id)
    REFERENCES Guards (id);

-- Reference: _Guards (table: pending_tasks) done
ALTER TABLE pending_tasks ADD CONSTRAINT _Guards_done FOREIGN KEY _Guards_done (userDone_id)
    REFERENCES Guards (id);

-- End of file.

-- insertar datos en la tabla Ranks
INSERT INTO Ranks (id, name, code) VALUES (1, 'T.P', 1),
(2, 'SLDO',2),
(3, 'CBOS',3),
(4, 'CBOP',4),
(5, 'SGOS',5),
(6, 'SGOP',6),
(7, 'SUBS',7),
(8, 'SUBP',8),
(9, 'SUBM',9),
(10, 'SUBT',10),
(11, 'TNTE',11),
(12, 'CAPT',12),
(13, 'MAYO',13),
(14, 'TCRN',14),
(15, 'CRNL',15),
(16, 'GRAB',16);

-- insertar datos en la tabla Drivers
INSERT INTO Drivers (id, identification_card, names, last_names, phone, blood_type, rank_id) VALUES (1, '1718324765', 'BRYAN', 'CRUZ', '0959113863', 'A+', 11),
(2, '1003383613', 'Pedro', 'Perez', '1234567891', 'O+', 2);

--INSERTAR DATOS EN LA TABLA VEHICLES
INSERT INTO Vehicles (id, description, plate, in_university) VALUES (1, 'CAMIONETA CHEVROLET', 'ABC-1234', 1),
(2, 'BUSETA GRIS', 'PCB-8005', 1);

--INSERTAR DATOS EN LA TABLA GUARDS
INSERT INTO Guards (id, identification_card, names, last_names, phone, blood_type, password) VALUES (1, '1718324765', 'STEFANY', 'ERAZO', '0959113863', 'B+', '123456'),
(2, '1003383613', 'Pedro', 'Perez', '1234567891', 'O+', '123456');

-- INSERTAR DATOS EN LA TABLA NOVEDADES
INSERT INTO Novelties (id, hour, novelty, Guard_id) VALUES (1, '2021-08-08 14:57:42', 'Novedad 1', 1),
(2, '2021-08-08 14:57:42', 'Novedad 2', 2);


-- insertar datos en tabla pending_tasks
INSERT INTO pending_tasks (id, hour_create, hour_done, pending_task, task_done, userCreate_id, userDone_id, observations) VALUES (1, '2021-08-08 14:57:42', '2021-08-08 14:57:42', 'Tarea 1', 1, 1, 1, 'Observacion 1'),
(2, '2021-08-08 14:57:42', '2021-08-08 14:57:42', 'Tarea 2', 0, 2, 2, 'Observacion 2');

-- insertar datos en tabla vehicle_logs
INSERT INTO Vehicle_Logs (id, departure_time, entry_time, destination, departure_km, entry_km, mission, observation, GuardsOut_id, GuardsIn_id, Vehicle_id, Driver_id) VALUES 
(1, '2021-08-07 14:57:42', '2021-08-08 14:57:42', 'Destino 1', 123, 456, 'Mision 1', 'Observacion 1', 1, 2, 1, 1),
(2, '2021-08-08 14:57:42', '2021-08-09 14:57:42', 'Destino 2', 2222, 5555, 'Mision 2', 'Observacion 2', 2, 2, 2, 2);



-- ******** CREACIÓN DE VISTAS *********
-- Vista novedades
create view View_Novelties As
select N.novelty, N.hour, concat(G.names, ' ',G.last_names) as Guard,
N.deleted_at
from Novelties as N
inner join  guards as G on N.Guard_id = G.id
order by 2 desc
limit 50;

-- Vista Tareas pendientes
create view View_pedding_task AS
select pt.hour_create, pt.pending_task, concat(g.names, ' ',g.last_names) as guardCreate from pending_tasks as PT
inner join guards as G on G.id=pt.userCreate_id
where pt.task_done = 0
order by 1;

-- Vista Tareas realizadas
create view View_task_done AS
select PT.pending_task, pt.hour_create, PT.hour_done, concat(GC.names, ' ',GC.last_names) as guardCreate,
       concat(GD.names, ' ',GD.last_names) as guardDone, PT.observations
from pending_tasks as PT
inner join guards as GC on GC.id=pt.userCreate_id
inner join guards as GD on GD.id=pt.userDone_id
order by 2 desc
limit 50;


-- Vista para ver bitácora vehicular
create view View_vehiclesLog as
select V.plate, V.description, BV.departure_time, BV.entry_time,concat(R.name,'. ',D.names,' ',D.last_names) as driver,
       BV.destination, BV.mission, BV.observation, (BV.entry_km-BV.departure_km) as totalKm,
       concat(GO.names, ' ',GO.last_names) as guardOut, concat(GI.names, ' ',GI.last_names) as guardIn
from vehicle_logs as BV
inner join vehicles as V on BV.Vehicle_id = V.id
inner join Drivers D on BV.Driver_id = D.id
inner join ranks r on D.rank_id = r.id
inner join guards as GO on GO.id=BV.GuardsOut_id
inner join guards as GI on GI.id=BV.GuardsIn_id
order by 3 desc
limit 50;


-- Vista para ver los vehiculos que se encuentran fuera de la universidad
create view View_vehiclesOut as
select V.plate, V.description, concat(R.name,'. ',D.names,' ',D.last_names) as driver,
       BV.departure_time, BV.destination, BV.mission, concat(GO.names, ' ',GO.last_names) as guardOut
from vehicle_logs as BV
inner join vehicles as V on BV.Vehicle_id = V.id
inner join Drivers D on BV.Driver_id = D.id
inner join ranks r on D.rank_id = r.id
inner join guards as GO on GO.id=BV.GuardsOut_id
where V.in_university = 0
order by 3;



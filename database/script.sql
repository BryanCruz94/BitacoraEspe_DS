CREATE VIEW `view_novelties` AS
    SELECT
        `n`.`novelty` AS `novelty`,
        `n`.`hour` AS `hour`,
        CONCAT(`g`.`names`, ' ', `g`.`last_names`) AS `Guard`
    FROM
        (`novelties` `n`
        JOIN `users` `g` ON (`n`.`Guard_id` = `g`.`id`))
    ORDER BY 2 DESC
    LIMIT 50;

CREATE VIEW `view_pedding_task` AS
    SELECT
        `pt`.`id` AS `id`,
        `pt`.`hour_create` AS `hour_create`,
        `pt`.`pending_task` AS `pending_task`,
        CONCAT(`g`.`names`, ' ', `g`.`last_names`) AS `guardCreate`
    FROM
        (`pending_tasks` `pt`
        JOIN `users` `g` ON (`g`.`id` = `pt`.`userCreate_id`))
    WHERE
        `pt`.`task_done` = 0
    ORDER BY 1;

CREATE VIEW `view_task_done` AS
    SELECT
        `pt`.`pending_task` AS `pending_task`,
        `pt`.`hour_create` AS `hour_create`,
        `pt`.`hour_done` AS `hour_done`,
        CONCAT(`gc`.`names`, ' ', `gc`.`last_names`) AS `guardCreate`,
        CONCAT(`gd`.`names`, ' ', `gd`.`last_names`) AS `guardDone`,
        `pt`.`observations` AS `observations`
    FROM
        ((`pending_tasks` `pt`
        JOIN `users` `gc` ON (`gc`.`id` = `pt`.`userCreate_id`))
        JOIN `users` `gd` ON (`gd`.`id` = `pt`.`userDone_id`))
    ORDER BY 2 DESC
    LIMIT 50;

CREATE VIEW `view_vehicleslog` AS
    SELECT
        `bv`.`id` AS `id`,
        `v`.`plate` AS `plate`,
        `v`.`description` AS `description`,
        `bv`.`departure_time` AS `departure_time`,
        `bv`.`entry_time` AS `entry_time`,
        CONCAT(`r`.`name`,
                '. ',
                `d`.`names`,
                ' ',
                `d`.`last_names`) AS `driver`,
        `bv`.`destination` AS `destination`,
        `bv`.`mission` AS `mission`,
        `bv`.`observation` AS `observation`,
        `bv`.`entry_km` - `bv`.`departure_km` AS `totalKm`,
        CONCAT(`go`.`names`, ' ', `go`.`last_names`) AS `guardOut`,
        CONCAT(`gi`.`names`, ' ', `gi`.`last_names`) AS `guardIn`
    FROM
        (((((`vehicle_logs` `bv`
        JOIN `vehicles` `v` ON (`bv`.`Vehicle_id` = `v`.`id`))
        JOIN `drivers` `d` ON (`bv`.`Driver_id` = `d`.`id`))
        JOIN `ranks` `r` ON (`d`.`rank_id` = `r`.`id`))
        JOIN `users` `go` ON (`go`.`id` = `bv`.`GuardsOut_id`))
        LEFT JOIN `users` `gi` ON (`gi`.`id` = `bv`.`GuardsIn_id`))
    ORDER BY '4' DESC
    LIMIT 50;

CREATE VIEW `view_vehiclesout` AS
    SELECT
        `v`.`plate` AS `plate`,
        `v`.`description` AS `description`,
        CONCAT(`r`.`name`,
                '. ',
                `d`.`names`,
                ' ',
                `d`.`last_names`) AS `driver`,
        `bv`.`departure_time` AS `departure_time`,
        `bv`.`destination` AS `destination`,
        `bv`.`mission` AS `mission`,
        CONCAT(`go`.`names`, ' ', `go`.`last_names`) AS `guardOut`
    FROM
        ((((`vehicle_logs` `bv`
        JOIN `vehicles` `v` ON (`bv`.`Vehicle_id` = `v`.`id`))
        JOIN `drivers` `d` ON (`bv`.`Driver_id` = `d`.`id`))
        JOIN `ranks` `r` ON (`d`.`rank_id` = `r`.`id`))
        JOIN `users` `go` ON (`go`.`id` = `bv`.`GuardsOut_id`))
    WHERE
        `v`.`in_university` = 0
    ORDER BY '4';



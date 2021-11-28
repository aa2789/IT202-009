CREATE TABLE IF NOT EXISTS  `Cart`
(
    `id`         int auto_increment not null,
    `product_id`    int,
    `user_id`  int,
    `desired_quantity`  int default 1,
    `unit_cost`  int,
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    UNIQUE KEY (`product_id`, `user_id`)
)
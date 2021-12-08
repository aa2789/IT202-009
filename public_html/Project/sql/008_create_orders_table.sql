CREATE TABLE IF NOT EXISTS  `Orders`
(
    `id`         int auto_increment not null,
    `user_id`  int,
    `total_price`  int,
    `address` varchar(255) not null,
    `payment_method` varchar(255) not null,
    `created`    timestamp default current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`)
)
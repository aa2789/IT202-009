CREATE TABLE IF NOT EXISTS  `Ratings`
(
    `id`         int auto_increment not null,
    `product_id`    int,
     `user_id`    int,
    `rating`  int,
    comment TEXT,
    `created` timestamp default current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`)
    
)
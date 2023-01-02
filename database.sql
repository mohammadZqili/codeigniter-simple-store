CREATE TABLE `brands` (
                          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                          `name` varchar(255) NOT NULL,
                          `slogan` varchar(255) NOT NULL,
                          `description` text NULL,
                          `image` text NULL,
                          `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
                          `deleted_at` timestamp DEFAULT NULL,
                          PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;





CREATE TABLE `products` (
                            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                            `name` varchar(255) NOT NULL,
                            `description` text  NULL,
                            `image` text NULL,
                            `price` int(11) NOT NULL default 0,
                            `count` int(11) NOT NULL default 0,
                            `category_id` int(11) NOT NULL,
                            `brand_id` int(11) NOT NULL,
                            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
                            `deleted_at` timestamp DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `categories` (
                              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                              `name` varchar(100) NOT NULL,
                              `show_room` text  NULL,
                              `description` text  NULL,
                              `image` text NULL,
                              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                              `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
                              `deleted_at` timestamp DEFAULT NULL,
                              PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;




CREATE TABLE `wish_lists` (
                              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                              `user_id` varchar(100) NOT NULL,
                              `product_id` int  NULL,
                              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                              `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP,
                              `deleted_at` timestamp DEFAULT NULL,
                              PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;



# Digital Ads

## Tables
- user

```sql
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
- user_ads

```sql
DROP TABLE IF EXISTS `user_ads`;
CREATE TABLE `user_ads` (
  `id_ads` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ads`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- user_comment

```sql
DROP TABLE IF EXISTS `user_comment`;
CREATE TABLE `user_comment` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `commented_by` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- user_rating

```sql
DROP TABLE IF EXISTS `user_rating`;
CREATE TABLE `user_rating` (
  `id_rate` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `commented_by` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY (`id_rate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

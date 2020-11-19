use laravel_local;

INSERT INTO tags (name) VALUES
('Business'),
('Sport'),
('Art'),
('Social'),
('Technology'),
('Lifestyle'),
('Three'),
('Photography'),
('Education'),
('Economy'),
('Culture'),
('Politics'),
('Entertainment'),
('World'),
('Health');

INSERT INTO categories (name, slug) VALUES
('Последние новости', 'Latest News'),
('Спорт', 'Sport'),
('Экономика', 'economy'),
('Культура', 'culture'),
('Политика', 'politics'),
('Бизнес', 'business'),
('Развлечения', 'entertainment'),
('Мир', 'World'),
('Здоровье', 'Health');


INSERT INTO users (firstname, lastname, email, `password`, is_admin ) VALUES
('admin', 'admin', 'admin@email.com', '123', 1),
('notauthorized', 'notauthorized', 'noemail', 'nopass', 0);

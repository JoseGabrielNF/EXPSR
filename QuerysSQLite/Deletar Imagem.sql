-- SQLite
DELETE FROM `Imagens` 
where email_user = '2@2.com';

select count(email_user) from Albuns where email_user = 'w@w.com'

DELETE from Albuns 
where nomeAlbum = 'Aleatoriedades'

DELETE from Usuarios 
where email = 'EMAIL'

SELECT * from Imagens
where email_user = 'web@email.com' AND
nomeAlbum = 'Aleatoriedades'
ORDER BY nomeAlbum
DESC LIMIT 1
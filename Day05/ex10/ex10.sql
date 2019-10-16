USE student_base; 
select film.title as "Title", film.summary as "Summary", `prod_year`
from film
inner join genre
on film.id_genre = genre.id_genre
where genre.name like "erotic"
ORDER BY `prod_year` DESC;
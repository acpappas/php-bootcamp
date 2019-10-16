USE base_student;
SELECT `title`,`summary`
FROM`film`
WHERE
LOWER(`summary`) LIKE '%vincent%'
ORDER BY
`id_film` ASC;
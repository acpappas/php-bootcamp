USE base_student;
SELECT
  ROUND(AVG(`nb_seats`), 0) AS 'average'
FROM
  `cinema`;
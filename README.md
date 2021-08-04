# io
Custom framework

select p1.`index`              as 'POS BEFORE',
       DATE(p1.created_at)     as 'DAY BEFORE',
       p2.`index`              as 'POS LAST',
       DATE(p2.created_at)     as 'DAY LAST',
       (p2.index - p1.`index`) as 'DIFF',
       p2.country,
       p1.country
from position p1
         inner join position p2
                    on p1.country = p2.country
                        and p1.rating_type = p2.rating_type
                        and p2.id is not null
where (p1.created_at) <= (p2.created_at - interval 1 day)
  and p2.`index` != p1.`index`
  and p1.id != p2.id
  and p1.country = p2.country
;


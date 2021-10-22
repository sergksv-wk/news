do
$$
begin
	if not exists(
		select 
		from news_cat
	) then
		insert into news_cat (
			"name"
			,state
		)
		values
			('Первые записи', 1)
			,('Вторые условия', 0)
			,('Третии заметки', 1);
	end if;
	
	-- select * from news_cat;

	for i in 1..10 loop
		insert INTO news(
			news_cat_id
			,"name"
			,state
			,date_reg
		)
		values
			(1, i::text || ' Прошли 1 записи', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(1, i::text || ' Прошли 2 записи', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(1, i::text || ' Прошли 3 записи', 0, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(1, i::text || ' Прошли 4 записи', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))

			,(2, i::text || ' Открыли 1 условие', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(2, i::text || ' Открыли 2 условия', 0, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(2, i::text || ' Открыли 3 условия', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(2, i::text || ' Открыли 4 условия', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))

			,(3, i::text || ' Сделали 1000 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1100 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1200 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1300 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1400 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1500 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1600 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
			,(3, i::text || ' Сделали 1700 заметок', 1, now() + random() * (timestamp '2020-01-20 20:00:00' - timestamp '2022-01-10 10:00:00'))
		;
	end loop;

	/*
	select 
		nc.name
		,count(*) 
	from 
		news_cat	nc
		join news 	n	on	
							n.news_cat_id = nc.id
							and n.state = 1
	group by nc.name
	*/
end;
$$
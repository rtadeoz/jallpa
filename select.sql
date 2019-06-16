SELECT * FROM db_hackathon_mc_jallpa.inmuebles;

SELECT * FROM db_hackathon_mc_jallpa.ubigeo;

load data infile "/Users/JB-PC/Desktop/ubigeos.csv" into table db_hackathon_mc_jallpa.ubigeo
fields terminated by ';'
lines terminated by '\n'
IGNORE 1 LINES;

--truncate table db_hackathon_mc_jallpa.ubigeo;

SELECT * FROM db_hackathon_mc_jallpa.categoria_inmuebles;

load data infile "/Users/JB-PC/Desktop/categoria_inmuebles.csv" into table db_hackathon_mc_jallpa.categoria_inmuebles
fields terminated by ';'
lines terminated by '\n'
IGNORE 1 LINES;

--truncate table db_hackathon_mc_jallpa.categoria_inmuebles;


SELECT * FROM db_hackathon_mc_jallpa.inmuebles
where id_category not in (1,2,3,4,5,6,7) and id_property = 0;

load data infile "/Users/JB-PC/Desktop/inmuebles_todo.csv" into table db_hackathon_mc_jallpa.inmuebles
fields terminated by ';'
lines terminated by '\n'
IGNORE 1 LINES;

--truncate table db_hackathon_mc_jallpa.inmuebles;

--drop table db_hackathon_mc_jallpa.inmuebles_full;

create table db_hackathon_mc_jallpa.inmuebles_full
select 
 i.id_property
,i.property_name
,i.observation
,i.x 
,i.y 
,i.zone
,i.latitud
,i.lenght
,i.address
,i.facade
,i.type_standar
,i.number_standar
,i.file_standar
,u.id_department
,u.department_name
,u.id_province
,u.province_name
,u.id_district
,u.distrct_name
,c.id_category
,c.category_name
from db_hackathon_mc_jallpa.inmuebles i
left join db_hackathon_mc_jallpa.ubigeo u on i.id_district = u.id_district
left join db_hackathon_mc_jallpa.categoria_inmuebles c on i.id_category = c.id_category;

SELECT * FROM db_hackathon_mc_jallpa.inmuebles_full;

SELECT * FROM db_hackathon_mc_jallpa.roles;

SELECT * FROM db_hackathon_mc_jallpa.usuarios;


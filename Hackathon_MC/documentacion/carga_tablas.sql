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

select 
i.id_property, 
i.property_name,
i.facade,
i.type_standar, 
i.number_standar,
i.id_category, 
i.category_name, 
i.id_province, 
i.department_name, 
i.id_province, 
i.province_name, 
i.id_district, 
i.distrct_name, 
i.address, 
i.x, 
i.y, 
i.zone, 
i.latitud, 
i.lenght
from db_hackathon_mc_jallpa.inmuebles_full i;

select * from db_hackathon_mc_jallpa.usuarios;

select 
i.id_property, 
i.property_name,
i.facade,
i.type_standar, 
i.number_standar,
count(1)
from db_hackathon_mc_jallpa.inmuebles_full i
group by 
i.id_property, 
i.property_name,
i.facade,
i.type_standar,
i.number_standar
having count(*)>1;

select 
i.id_property, 
i.property_name,
i.facade,
i.type_standar,
i.number_standar,
max(property_name),max(facade),max(type_standar),max(number_standar)
from db_hackathon_mc_jallpa.inmuebles_full i
group by 
i.id_property, 
i.property_name,
i.facade,
i.type_standar,
i.number_standar
having count(*)>1;

insert into db_hackathon_mc_jallpa.ficha_unificada (
id_property, 
property_name,
id_category, 
category_name, 
id_department, 
department_name, 
id_province, 
province_name, 
id_district, 
distrct_name, 
address, 
x, 
y, 
zone, 
latitud, 
lenght,
facade,
type_standar,
number_standar)
select 
i.id_property, 
i.property_name,
i.id_category, 
i.category_name, 
i.id_department, 
i.department_name, 
i.id_province, 
i.province_name, 
i.id_district, 
i.distrct_name, 
i.address, 
i.x, 
i.y, 
i.zone, 
i.latitud, 
i.lenght,
max(facade) as facade,
max(type_standar) as type_standar,
max(number_standar) as number_standar
from db_hackathon_mc_jallpa.inmuebles_full i
group by 
i.id_property, 
i.property_name,
i.id_category, 
i.category_name, 
i.id_department, 
i.department_name, 
i.id_province, 
i.province_name, 
i.id_district, 
i.distrct_name, 
i.address, 
i.x, 
i.y, 
i.zone, 
i.latitud, 
i.lenght;

select * from db_hackathon_mc_jallpa.ficha_unificada;

truncate table db_hackathon_mc_jallpa.ficha_unificada;

insert into db_hackathon_mc_jallpa.ficha_unificada (
id_property, 
property_name,
id_category, 
category_name, 
id_department, 
department_name, 
id_province, 
province_name, 
id_district, 
distrct_name, 
address, 
x, 
y, 
zone, 
latitud, 
lenght,
facade,
type_standar,
number_standar
)
select 
a.id_property, 
a.property_name,
a.id_category, 
a.category_name, 
a.id_department, 
a.department_name, 
a.id_province, 
a.province_name, 
a.id_district, 
a.distrct_name, 
a.address, 
a.x, 
a.y, 
a.zone, 
a.latitud, 
a.lenght,
a.facade,
a.type_standar,
a.number_standar
from 
	(select 
	i.id_property, 
	i.property_name,
	i.id_category, 
	i.category_name, 
	i.id_department, 
	i.department_name, 
	i.id_province, 
	i.province_name, 
	i.id_district, 
	i.distrct_name, 
	i.address, 
	i.x, 
	i.y, 
	i.zone, 
	i.latitud, 
	i.lenght,
	max(facade) as facade,
	max(type_standar) as type_standar,
	max(number_standar) as number_standar
	from db_hackathon_mc_jallpa.inmuebles_full i
	group by 
	i.id_property, 
	i.property_name,
	i.id_category, 
	i.category_name, 
	i.id_department, 
	i.department_name, 
	i.id_province, 
	i.province_name, 
	i.id_district, 
	i.distrct_name, 
	i.address, 
	i.x, 
	i.y, 
	i.zone, 
	i.latitud, 
	i.lenght) a
;

UPDATE db_hackathon_mc_jallpa.inmuebles_full SET 
			 address = 'SALAMANCA'
			,x = '10'
			,y = '10'
			,date_register = '2019-06-16'
			,modification_date = '2019-06-16'
			,approval_date = '2019-06-16'
		WHERE id_property = 3853;
 
 SELECT * FROM db_hackathon_mc_jallpa.inmuebles_full
 WHERE id_property = 3853;
        
      --  Huallaga 458-460-462-464-466

insert into db_hackathon_mc_jallpa.FICHA_PATRIMONIO_CULTURAL (
id_property, 
property_name,
id_district, 
id_category, 
address, 
x, 
y
)
select 
a.id_property, 
a.property_name,
a.id_district, 
a.id_category, 
a.address, 
a.x, 
a.y
from 
	(select 
	i.id_property, 
	i.property_name,
	i.id_category, 
	i.category_name, 
	i.id_department, 
	i.department_name, 
	i.id_province, 
	i.province_name, 
	i.id_district, 
	i.distrct_name, 
	i.address, 
	i.x, 
	i.y, 
	i.zone, 
	i.latitud, 
	i.lenght,
	max(facade) as facade,
	max(type_standar) as type_standar,
	max(number_standar) as number_standar
	from db_hackathon_mc_jallpa.inmuebles_full i
	group by 
	i.id_property, 
	i.property_name,
	i.id_category, 
	i.category_name, 
	i.id_department, 
	i.department_name, 
	i.id_province, 
	i.province_name, 
	i.id_district, 
	i.distrct_name, 
	i.address, 
	i.x, 
	i.y, 
	i.zone, 
	i.latitud, 
	i.lenght) a
;

SELECT * FROM db_hackathon_mc_jallpa.FICHA_PATRIMONIO_CULTURAL;
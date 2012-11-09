#This is search CREATE SQL.
#@author Conan Zhang
#@date 2012-11-07

use search;

INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1686830902,'机器学习','choice','leader',true);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1686830902,'数据挖掘','choice','leader',true);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(2022255405,'数据挖掘','choice','leader',true);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1658771391,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1822639887,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(2514669664,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1864823707,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1400524015,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(2285778707,'数据挖掘','choice','leader',true);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1869170057,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(1943577155,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(2722723393,'数据挖掘','choice','leader',false);
INSERT INTO t_user_sign(uid,area,reason,type,verified) values(2060750830,'数据挖掘','choice','leader',false);


insert into t_load_user(screen_name) values('Conan_Z');


DELETE FROM t_load_user;
INSERT INTO t_load_user(screen_name) 
	SELECT screen_name FROM `v_fans_area` LIMIT 400,300;

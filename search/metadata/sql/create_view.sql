use search;

DROP VIEW v_fans_area;
CREATE VIEW v_fans_area AS
	SELECT r.fansid,u.screen_name,count(r.uid) AS num,s.area
	FROM t_user_relate r,t_user_sign s,t_user u
	WHERE r.uid =s.uid and r.fansid=u.uid
	GROUP BY r.fansid,s.area
	ORDER BY num DESC;
	
/* 标准查询
 * select * from v_fans_area where area='数据挖掘' limit 10;
 */
	
	
DROP VIEW v_user_sign;
CREATE VIEW v_user_sign AS
	SELECT s.id,s.uid,u.screen_name, s.area,s.reason,s.type,s.verified,s.create_date
	FROM t_user_sign s, t_user u
	WHERE s.uid=u.uid

/*
 * select * from v_user_sign limit 10;
 */
	
	
DROP VIEW v_fans;
CREATE VIEW v_fans AS
	SELECT r.fansid,u.screen_name,u.profile_image_url,u.followers_count,u.friends_count,u.statuses_count,u.verified,u.created_at,r.uid
	FROM t_user u, t_user_relate r
	WHERE  r.fansid = u.uid /*and r.uid='1999250817'*/
/*
 * select * from v_fans where uid='1999250817' limit 10;
 */	

DROP VIEW v_follows;
CREATE VIEW v_follows AS
	SELECT r.uid,u.screen_name,u.profile_image_url,u.followers_count,u.friends_count,u.statuses_count,u.verified,u.created_at,r.fansid
	FROM t_user u, t_user_relate r
	WHERE r.uid = u.uid /*and r.fansid='1999250817'*/
/*
 * select * from v_follows where fansid='1999250817' limit 10;
 */	

//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.model;

import java.sql.Timestamp;
import org.conan.base.BaseObject;

/**
 * This is TweetSource Model DTO
 * @author Conan Zhang
 * @date 2012-11-10
 */
public class TweetSourceDTO extends BaseObject {

private static final long serialVersionUID = 13525604104680L;

public TweetSourceDTO(){}
public TweetSourceDTO(String url, String relation_ship, String name, Timestamp create_date){
this.url = url;
this.relation_ship = relation_ship;
this.name = name;
this.create_date = create_date;
}


private int id;
private String url;
private String relation_ship;
private String name;
private Timestamp create_date;

public int getId() {
return this.id;
}

public String getUrl (){
return this.url;
}
public String getRelation_ship (){
return this.relation_ship;
}
public String getName (){
return this.name;
}
public Timestamp getCreate_date (){
return this.create_date;
}


public void setId(int id) {
this.id = id;
}

public void setUrl(String url) {
this.url = url;
}
public void setRelation_ship(String relation_ship) {
this.relation_ship = relation_ship;
}
public void setName(String name) {
this.name = name;
}
public void setCreate_date(Timestamp create_date) {
this.create_date = create_date;
}


}

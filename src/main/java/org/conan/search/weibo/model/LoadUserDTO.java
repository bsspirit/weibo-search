//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.model;

import java.sql.Timestamp;
import org.conan.base.BaseObject;

/**
 * This is LoadUser Model DTO
 * @author Conan Zhang
 * @date 2012-11-08
 */
public class LoadUserDTO extends BaseObject {

private static final long serialVersionUID = 13523534455150L;

public LoadUserDTO(){}
public LoadUserDTO(String screen_name, Timestamp create_date){
this.screen_name = screen_name;
this.create_date = create_date;
}


private int id;
private String screen_name;
private Timestamp create_date;

public int getId() {
return this.id;
}

public String getScreen_name (){
return this.screen_name;
}
public Timestamp getCreate_date (){
return this.create_date;
}


public void setId(int id) {
this.id = id;
}

public void setScreen_name(String screen_name) {
this.screen_name = screen_name;
}
public void setCreate_date(Timestamp create_date) {
this.create_date = create_date;
}


}

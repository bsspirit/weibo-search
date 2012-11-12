//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.model;

import java.sql.Timestamp;
import org.conan.base.BaseObject;

/**
 * This is LoadFrequence Model DTO
 * @author Conan Zhang
 * @date 2012-11-07
 */
public class LoadFrequenceDTO extends BaseObject {

private static final long serialVersionUID = 13522948777961L;

public LoadFrequenceDTO(){}
public LoadFrequenceDTO(Long uid, String type, Timestamp create_date){
this.uid = uid;
this.type = type;
this.create_date = create_date;
}


private int id;
private Long uid;
private String type;
private Timestamp create_date;

public int getId() {
return this.id;
}

public Long getUid (){
return this.uid;
}
public String getType (){
return this.type;
}
public Timestamp getCreate_date (){
return this.create_date;
}


public void setId(int id) {
this.id = id;
}

public void setUid(Long uid) {
this.uid = uid;
}
public void setType(String type) {
this.type = type;
}
public void setCreate_date(Timestamp create_date) {
this.create_date = create_date;
}


}

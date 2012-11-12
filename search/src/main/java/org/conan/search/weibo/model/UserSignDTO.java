//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.model;

import java.sql.Timestamp;
import org.conan.base.BaseObject;

/**
 * This is UserSign Model DTO
 * @author Conan Zhang
 * @date 2012-11-07
 */
public class UserSignDTO extends BaseObject {

private static final long serialVersionUID = 13522543641561L;

public UserSignDTO(){}
public UserSignDTO(Long uid, String area, String reason, String type, String verified, Timestamp create_date){
this.uid = uid;
this.area = area;
this.reason = reason;
this.type = type;
this.verified = verified;
this.create_date = create_date;
}


private int id;
private Long uid;
private String area;
private String reason;
private String type;
private String verified;
private Timestamp create_date;

public int getId() {
return this.id;
}

public Long getUid (){
return this.uid;
}
public String getArea (){
return this.area;
}
public String getReason (){
return this.reason;
}
public String getType (){
return this.type;
}
public String getVerified (){
return this.verified;
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
public void setArea(String area) {
this.area = area;
}
public void setReason(String reason) {
this.reason = reason;
}
public void setType(String type) {
this.type = type;
}
public void setVerified(String verified) {
this.verified = verified;
}
public void setCreate_date(Timestamp create_date) {
this.create_date = create_date;
}


}

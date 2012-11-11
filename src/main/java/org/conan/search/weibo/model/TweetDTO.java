//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.model;

import java.util.Date;
import java.sql.Timestamp;
import org.conan.base.BaseObject;

/**
 * This is Tweet Model DTO
 * @author Conan Zhang
 * @date 2012-11-10
 */
public class TweetDTO extends BaseObject {

private static final long serialVersionUID = 13525625096400L;

public TweetDTO(){}
public TweetDTO(Long tid, Long mid, Long uid, Long retid, Date created_at, String text, String source_name, Integer reposts_count, Integer comments_count, String thumbnailPic, String bmiddlePic, String originalPic, Timestamp create_date){
this.tid = tid;
this.mid = mid;
this.uid = uid;
this.retid = retid;
this.created_at = created_at;
this.text = text;
this.source_name = source_name;
this.reposts_count = reposts_count;
this.comments_count = comments_count;
this.thumbnailPic = thumbnailPic;
this.bmiddlePic = bmiddlePic;
this.originalPic = originalPic;
this.create_date = create_date;
}


private int id;
private Long tid;
private Long mid;
private Long uid;
private Long retid;
private Date created_at;
private String text;
private String source_name;
private Integer reposts_count;
private Integer comments_count;
private String thumbnailPic;
private String bmiddlePic;
private String originalPic;
private Timestamp create_date;

public int getId() {
return this.id;
}

public Long getTid (){
return this.tid;
}
public Long getMid (){
return this.mid;
}
public Long getUid (){
return this.uid;
}
public Long getRetid (){
return this.retid;
}
public Date getCreated_at (){
return this.created_at;
}
public String getText (){
return this.text;
}
public String getSource_name (){
return this.source_name;
}
public Integer getReposts_count (){
return this.reposts_count;
}
public Integer getComments_count (){
return this.comments_count;
}
public String getThumbnailPic (){
return this.thumbnailPic;
}
public String getBmiddlePic (){
return this.bmiddlePic;
}
public String getOriginalPic (){
return this.originalPic;
}
public Timestamp getCreate_date (){
return this.create_date;
}


public void setId(int id) {
this.id = id;
}

public void setTid(Long tid) {
this.tid = tid;
}
public void setMid(Long mid) {
this.mid = mid;
}
public void setUid(Long uid) {
this.uid = uid;
}
public void setRetid(Long retid) {
this.retid = retid;
}
public void setCreated_at(Date created_at) {
this.created_at = created_at;
}
public void setText(String text) {
this.text = text;
}
public void setSource_name(String source_name) {
this.source_name = source_name;
}
public void setReposts_count(Integer reposts_count) {
this.reposts_count = reposts_count;
}
public void setComments_count(Integer comments_count) {
this.comments_count = comments_count;
}
public void setThumbnailPic(String thumbnailPic) {
this.thumbnailPic = thumbnailPic;
}
public void setBmiddlePic(String bmiddlePic) {
this.bmiddlePic = bmiddlePic;
}
public void setOriginalPic(String originalPic) {
this.originalPic = originalPic;
}
public void setCreate_date(Timestamp create_date) {
this.create_date = create_date;
}


}

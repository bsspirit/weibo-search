package org.conan.search.weibo.action;

import java.io.IOException;
import java.util.Set;

import weibo4j.model.WeiboException;

/**
 * 加载大量数据
 * 
 */
public interface LoadService {

    // fans
    void fans(long userid, String token) throws WeiboException; // 取前200个
    void fans(long userid, int n, String token) throws WeiboException;// 取前n个
    void fans(long userid, Set<Long> userids, String token) throws WeiboException; //userids之前的所有关注 ,最多2000个

    // follow
    void follow(long userid, String token) throws WeiboException; // 取前200个
    void follow(long userid, int n, String token) throws WeiboException; // 取前n个
    void follow(long userid, Set<Long> userids, String token) throws WeiboException; //userids之前的所有关注 ,最多1000个
    
    // tweet
    void tweet(long userid,String token) throws WeiboException;// 取前200个
    void tweet(long userid, int n, String token) throws WeiboException;// 取前n个
    void tweet(long userid, long tid, String token) throws WeiboException;// 取tid之后的所有微博
    
    // frequence check
    int loadDiffDays(long uid, String type);
    boolean loadLimit(long uid, String type, int date) ;//true允许,false不允许,几天
    
    // uid and screen
    Long getUidByScreen(String screen, String token) throws WeiboException, IOException ;
    String getScreenByUid(long uid, String token) throws WeiboException, IOException ;

}

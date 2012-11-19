package org.conan.search.weibo.action;

import weibo4j.model.WeiboException;

/**
 * 加载大量数据
 * 
 */
public interface LoadService {

    // fans
    void fans(long userid, String token) throws WeiboException; // 取前200个
    void fans(long userid, int n, String token) throws WeiboException;// 取前n个

    // follow
    void follow(long userid, String token) throws WeiboException; // 取前200个
    void follow(long userid, int n, String token) throws WeiboException; // 取前n个
    
    // tweet
    void tweet(long userid,String token) throws WeiboException;// 取前200个
    void tweet(long userid, int n, String token) throws WeiboException;// 取前n个
    void tweet(long userid, long tid, String token) throws WeiboException;// 取tid之后的前200个
    
    // frequence check
    int loadDiffDays(long uid, String type);
    boolean loadLimit(long uid, String type, int date) ;//true允许,false不允许,几天
    

}

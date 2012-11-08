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
    void follow(long userid, int n, String token) throws WeiboException; // 取前200个
    
    // frequence check
    boolean loadLimit(long uid, String type) ;//true允许,false不允许

}

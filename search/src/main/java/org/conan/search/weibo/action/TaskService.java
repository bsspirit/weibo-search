package org.conan.search.weibo.action;

import java.io.IOException;

import weibo4j.model.WeiboException;

/**
 * 后台执行任务 
 *
 */
public interface TaskService {
    
    public void load(long uid, String token) throws WeiboException, IOException ;
    public void load(String screen, String token) throws WeiboException, IOException ;
    public void loadDB(String token) throws WeiboException, IOException ;

}

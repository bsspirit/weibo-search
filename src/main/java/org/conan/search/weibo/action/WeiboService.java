package org.conan.search.weibo.action;

import org.conan.base.service.SpringService;

/**
 * 老版token设置接口
 * 
 */
@Deprecated
public interface WeiboService extends SpringService {

    void setUid(long uid);
    void setToken(String token);

}

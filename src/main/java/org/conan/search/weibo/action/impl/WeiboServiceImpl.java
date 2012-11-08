package org.conan.search.weibo.action.impl;

import java.util.HashMap;
import java.util.Map;

import org.conan.base.service.SpringServiceImpl;
import org.conan.search.weibo.action.WeiboService;
import org.conan.search.weibo.model.AccountDTO;
import org.conan.search.weibo.service.AccountService;
import org.springframework.beans.factory.annotation.Autowired;

import weibo4j.Weibo;

@Deprecated
public class WeiboServiceImpl extends SpringServiceImpl implements WeiboService {
    
    @Autowired
    AccountService accountService;
    
    @Override
    public void setUid(long uid) {
        Map<String, Object> paramMap = new HashMap<String, Object>();
        paramMap.put("uid", uid);
        AccountDTO dto = accountService.getAccountOne(paramMap);

        Weibo weibo = new Weibo();
        weibo.setToken(dto.getToken());
    }
    
    @Override
    public void setToken(String token) {
        Weibo weibo = new Weibo();
        weibo.setToken(token);
    }
    
}

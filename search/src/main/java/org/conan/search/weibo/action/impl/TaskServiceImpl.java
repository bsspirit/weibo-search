package org.conan.search.weibo.action.impl;

import java.io.IOException;
import java.util.HashMap;
import java.util.List;

import org.apache.log4j.Logger;
import org.conan.base.exception.WeiboExceptionParser;
import org.conan.base.service.SpringService;
import org.conan.search.weibo.action.LoadService;
import org.conan.search.weibo.action.TaskService;
import org.conan.search.weibo.action.WeiboActionService;
import org.conan.search.weibo.model.LoadUserDTO;
import org.conan.search.weibo.service.LoadUserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import weibo4j.examples.oauth2.Log;
import weibo4j.model.WeiboException;

@Service
public class TaskServiceImpl implements TaskService {

    final private static Logger log = Logger.getLogger(Log.class.getName());

    @Autowired
    LoadService loadService;
    @Autowired
    LoadUserService loadUserService;
    @Autowired
    WeiboActionService action;

    @Override
    public void load(long uid, String token) throws WeiboException, IOException {
//        loadService.follow(uid, SpringService.WEIBO_LOAD_COUNT_MAX, token);
//        loadService.fans(uid, SpringService.WEIBO_LOAD_COUNT_MAX, token);
        loadService.tweet(uid, SpringService.WEIBO_LOAD_COUNT_MAX, token);
        loadUserService.deleteLoadUser(new LoadUserDTO(loadService.getScreenByUid(uid, token), null));
    }

    @Override
    public void load(String screen, String token) throws WeiboException, IOException {
        try {
            Long uid = loadService.getUidByScreen(screen, token);
            load(uid, token);
        } catch (WeiboException we) {
            WeiboExceptionParser.parserCode(we, WeiboExceptionParser.SITE.CLIENT);
            loadUserService.deleteLoadUser(new LoadUserDTO(screen, null));
        }
    }

    @Override
    public void loadDB(String token) throws WeiboException, IOException {
        List<LoadUserDTO> list = loadUserService.getLoadUsers(new HashMap<String, Object>());
        log.info("LoadDB count: " + list.size());

        for (LoadUserDTO dto : list) {
            load(dto.getScreen_name(), token);
        }
    }

}

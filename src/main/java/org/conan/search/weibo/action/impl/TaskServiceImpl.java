package org.conan.search.weibo.action.impl;

import java.io.IOException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.log4j.Logger;
import org.conan.base.service.SpringService;
import org.conan.search.weibo.action.LoadService;
import org.conan.search.weibo.action.TaskService;
import org.conan.search.weibo.action.WeiboActionService;
import org.conan.search.weibo.model.LoadUserDTO;
import org.conan.search.weibo.model.UserDTO;
import org.conan.search.weibo.service.LoadUserService;
import org.conan.search.weibo.service.UserService;
import org.conan.search.weibo.util.WeiboTransfer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import weibo4j.examples.oauth2.Log;
import weibo4j.model.User;
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
    @Autowired
    UserService userService;

    @Override
    public void load(long uid, String token) throws WeiboException, IOException {
        loadService.follow(uid, SpringService.WEIBO_LOAD_COUNT_MAX, token);
        loadService.fans(uid, SpringService.WEIBO_LOAD_COUNT_MAX, token);
        loadService.tweet(uid, token);
    }

    @Override
    public void load(String screen, String token) throws WeiboException, IOException {
        Long uid = getUidByScreen(screen, token);
        load(uid, token);
    }

    @Override
    public void loadDB(String token) throws WeiboException, IOException {
        List<LoadUserDTO> list = loadUserService.getLoadUsers(new HashMap<String, Object>());
        log.info("LoadDB count: " + list.size());

        for (LoadUserDTO dto : list) {
            load(dto.getScreen_name(), token);
            loadUserService.deleteLoadUser(dto.getId());
        }
    }

    private Long getUidByScreen(String screen, String token) throws WeiboException, IOException {
        Map<String, Object> map = new HashMap<String, Object>();
        map.put("screen_name", screen);

        UserDTO dto = userService.getUserOne(map);
        Long uid = null;
        if (dto != null && dto.getUid() > 0) {
            uid = dto.getUid();
        } else {
            User u = action.user(screen, token);
            uid = Long.parseLong(u.getId());
            try {
                userService.insertUser(WeiboTransfer.user(u));
            } catch (Exception e) {
                log.warn("{user:" + uid + "}" + e.getMessage());
            }
        }
        log.info(uid + "," + screen);
        return uid;
    }

}

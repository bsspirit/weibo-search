package org.conan.search;

import java.io.IOException;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;

import org.conan.base.service.PageInObject;
import org.conan.base.service.SpringService;
import org.conan.base.util.SpringInitialize;
import org.conan.search.weibo.action.LoadService;
import org.conan.search.weibo.model.UserRelateDTO;
import org.conan.search.weibo.service.UserRelateService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import weibo4j.model.WeiboException;

@Component
public class DemoMainRun extends SpringInitialize {

    @Autowired
    LoadService loadService;

    @Autowired
    UserRelateService userRelateService;

    // AccessToken [accessToken=2.00AKoZEDzzDJbEde0742c13e9GYV4D,
    // expireIn=157679999, refreshToken=,uid=2816038140]
    public static void main(String[] args) throws IOException {
        String token = "2.00v9eSLCzzDJbE8e025c068aftigRE";
        inputObj.put("token", token);

        DemoMainRun demo = getContext().getBean(DemoMainRun.class);
        demo.run(args);
    }

    @Override
    public void input(String[] args) {
        inputObj.put("uid", "1999250817");
        inputObj.put("tid", "3513345531346574");
    }

    @Override
    public void help() {
    }

    @Override
    public void task() {
        try {
            Set<Long> uids = new HashSet<Long>();

            Map<String, Object> paramMap = new HashMap<String, Object>();
            //paramMap.put("fansid", 1999250817);
            paramMap.put("uid", 1999250817);
            
            List<UserRelateDTO> list = userRelateService.getUserRelatesPaging(paramMap, new PageInObject(0, 15, "id", "desc")).getList();

            for (UserRelateDTO dto : list) {
                uids.add(dto.getFansid());
            }

           // loadService.follow(1999250817, SpringService.WEIBO_LOAD_COUNT_200, inputObj.get("token"));
            loadService.fans(1999250817, SpringService.WEIBO_LOAD_COUNT_200, inputObj.get("token"));
        } catch (NumberFormatException e) {
            e.printStackTrace();
        } catch (WeiboException e) {
            e.printStackTrace();
        }
    }
}

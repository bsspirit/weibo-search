package org.conan.search;

import java.io.IOException;

import org.conan.search.weibo.action.TaskService;
import org.conan.search.weibo.action.WeiboActionService;
import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import weibo4j.model.User;
import weibo4j.model.WeiboException;

public class SpringInitialize {

    private static ApplicationContext ctx = null;

    private SpringInitialize() {
    }

    public static ApplicationContext getContext() {
        if (ctx == null) {
            ctx = new ClassPathXmlApplicationContext("spring.xml");
        }
        return ctx;
    }

    // AccessToken [accessToken=2.00v9eSLCzzDJbE8e025c068aftigRE,
    // expireIn=664938, refreshToken=,uid=1999250817]
    public static void main(String[] args) throws WeiboException, IOException {
        String token = "2.00v9eSLCzzDJbE8e025c068aftigRE";
        load("詹-坤-林", token);
        load("众趣张首华", token);
        load("元龙-数据", token);
        load("原点孙立文", token);
        load("Jarod", token);
        load("数据人论坛", token);
        load("孟鑫mengxin", token);
        load("innovate511", token);
        load("思考和计算的大狗", token);
        load("易观于揚", token);
        load("傅志华", token);
    }

    public static void load(String screen, String token) throws WeiboException, IOException {
        TaskService task = SpringInitialize.getContext().getBean(TaskService.class);
        task.load(screen, token);
    }

    public static void getUidFromScreen(String screen, String token) throws WeiboException, IOException {
        WeiboActionService action = SpringInitialize.getContext().getBean(WeiboActionService.class);
        User u = action.user(screen, token);
        System.out.println(u);
    }

}

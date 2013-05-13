package org.conan.search;

import java.io.IOException;

import org.apache.log4j.Logger;
import org.conan.base.service.SpringService;
import org.conan.base.util.MyCast;
import org.conan.base.util.SpringInitialize;
import org.conan.search.weibo.action.TaskService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import weibo4j.examples.oauth2.Log;
import weibo4j.model.WeiboException;

@Component
public class SpringMainRun extends SpringInitialize {

    final private static Logger log = Logger.getLogger(Log.class.getName());

    @Autowired
    TaskService taskService;

//    AccessToken [accessToken=2.00v9eSLCzzDJbEf6a8adb0936WttOD, 
//            expireIn=642833, refreshToken=,uid=1999250817]
    public static void main(String[] args) throws IOException {
        String token = "2.00AKoZEDzzDJbEde0742c13e9GYV4D";
        inputObj.put("token", token);

        SpringMainRun spring = getContext().getBean(SpringMainRun.class);
        spring.run(args);
    }

    @Override
    public void input(String[] args) {
        if (args.length > 0) {
            for (String arg : args) {
                if (arg.startsWith("-h")) {
                    help();
                }
                if (arg.startsWith("-t")) {
                    inputObj.put("task", arg.replaceFirst("-t", ""));
                }
                if (arg.startsWith("-screen")) {
                    inputObj.put("screen", arg.replaceFirst("-screen", ""));
                }
            }
        } else {
            help();
        }
    }

    @Override
    public void help() {
        System.out.println("Please Input argments: ");
        System.out.println("-tLOAD -screenConan_Z");
        System.out.println("-tLOADDB");
        System.exit(0);
    }

    @Override
    public void task() {
        String task = inputObj.get("task");
        String token = inputObj.get("token");
        String screen = inputObj.get("screen");

        try {
            MyCast.emptyCheck(task, "task");
            MyCast.emptyCheck(token, "token");
            switch (SpringService.TASK.valueOf(task)) {
            case LOAD:
                try {
                    MyCast.emptyCheck(screen, "screen");
                    taskService.load(screen, token);
                } catch (WeiboException we) {
                    log.error(we.getMessage(), we);
                } catch (IOException ioe) {
                    log.error(ioe.getMessage(), ioe);
                }
                break;
            case LOADDB:
                try {
                    taskService.loadDB(token);
                } catch (WeiboException we) {
                    log.error(we.getMessage(), we);
                } catch (IOException ioe) {
                    log.error(ioe.getMessage(), ioe);
                }
                break;
            }
        } catch (Exception e) {
            log.error(e.getMessage(), e);
        }
    }
}

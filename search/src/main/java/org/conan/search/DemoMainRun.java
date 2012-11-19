package org.conan.search;

import java.io.IOException;

import org.conan.base.service.SpringService;
import org.conan.base.util.SpringInitialize;
import org.conan.search.weibo.action.LoadService;
import org.conan.search.weibo.action.TaskService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import weibo4j.Timeline;
import weibo4j.model.Paging;
import weibo4j.model.Status;
import weibo4j.model.StatusWapper;
import weibo4j.model.WeiboException;

@Component
public class DemoMainRun extends SpringInitialize {

    @Autowired
    TaskService taskService;

    @Autowired
    LoadService loadService;

    // AccessToken [accessToken=2.00AKoZEDzzDJbEde0742c13e9GYV4D,
    // expireIn=157679999, refreshToken=,uid=2816038140]
    public static void main(String[] args) throws IOException {
        String token = "2.00v9eSLCzzDJbE8e025c068aftigRE";
        long uid = 1999250817l;
        long tid = 3510893100699457l;

        int count = SpringService.WEIBO_LOAD_COUNT_100;
        int page = 1;

        Timeline tm = new Timeline();
        tm.client.setToken(token);

        StatusWapper status = null;
        do {
            try {
                status = tm.getUserTimelineByUid(String.valueOf(uid), new Paging(page++, count, tid));
                for (Status s : status.getStatuses()) {
                    System.out.println(s.getText());
                }
            } catch (WeiboException e) {
                e.printStackTrace();
            }
        } while (status != null && status.getStatuses() != null && status.getStatuses().size() > 0);

    }

    @Override
    public void input(String[] args) {
    }

    @Override
    public void help() {
    }

    @Override
    public void task() {
    }
}

package org.conan.search;

import java.io.IOException;
import java.util.Map;

import org.conan.base.util.SpringInitialize;
import org.conan.search.weibo.action.TaskService;
import org.conan.search.weibo.util.WeiboTransfer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import weibo4j.Timeline;
import weibo4j.model.Status;
import weibo4j.model.StatusWapper;
import weibo4j.model.WeiboException;

@Component
public class DemoMainRun extends SpringInitialize {

    @Autowired
    TaskService taskService;

    // AccessToken [accessToken=2.00AKoZEDzzDJbEde0742c13e9GYV4D,
    // expireIn=157679999, refreshToken=,uid=2816038140]
    public static void main(String[] args) throws IOException {
        String token = "2.00AKoZEDzzDJbEde0742c13e9GYV4D";

        Timeline tm = new Timeline();
        tm.client.setToken(token);
        try {
            StatusWapper status = tm.getUserTimelineByUid("2816038140");
            for (Status s : status.getStatuses()) {
                Map<String, Object> map = WeiboTransfer.tweet(s);
                map.get(WeiboTransfer.KEY_TWEET);
                map.get(WeiboTransfer.KEY_TWEET_SOURCE);
                
                map.get(WeiboTransfer.KEY_RETWEET);
                map.get(WeiboTransfer.KEY_RETWEET_SOURCE);

            }
            System.out.println(status.getNextCursor());
            System.out.println(status.getPreviousCursor());
            System.out.println(status.getTotalNumber());
            System.out.println(status.getHasvisible());
        } catch (WeiboException e) {
            e.printStackTrace();
        }
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

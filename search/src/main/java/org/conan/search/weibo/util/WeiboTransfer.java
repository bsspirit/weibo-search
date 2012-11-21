package org.conan.search.weibo.util;

import java.util.HashMap;
import java.util.Map;

import org.conan.search.weibo.model.TweetDTO;
import org.conan.search.weibo.model.TweetSourceDTO;
import org.conan.search.weibo.model.UserDTO;

import weibo4j.model.Source;
import weibo4j.model.Status;
import weibo4j.model.User;

/**
 * 微博数据模型转换
 * 
 * @author Conan
 * 
 */
public class WeiboTransfer {

    public static UserDTO user(User u) {
        UserDTO dto = new UserDTO();
        dto.setUid(Long.parseLong(u.getId()));
        dto.setScreen_name(u.getScreenName());
        dto.setName(u.getName());
        dto.setProvince(u.getProvince());
        dto.setCity(u.getCity());
        dto.setLocation(u.getLocation());
        dto.setDescription(u.getDescription());
        dto.setUrl(u.getUrl());
        dto.setProfile_image_url(u.getProfileImageUrl());
        dto.setDomain(u.getUserDomain());
        dto.setGender(u.getGender());
        dto.setFollowers_count(u.getFollowersCount());
        dto.setFriends_count(u.getFriendsCount());
        dto.setStatuses_count(u.getStatusesCount());
        dto.setFavourites_count(u.getFavouritesCount());
        dto.setCreated_at(u.getCreatedAt());
        dto.setVerified(u.isVerified() ? "t" : "f");
        dto.setAllow_all_comment(u.isallowAllComment() ? "t" : "f");
        dto.setAllow_all_act_msg(u.isallowAllActMsg() ? "t" : "f");
        dto.setAvatar_large(u.getavatarLarge());
        dto.setOnline_status(u.getonlineStatus());
        dto.setRemark(u.getRemark());

        String reason = u.getVerified_reason();
        if (reason != null && reason.length() > 32)
            reason = u.getVerified_reason().substring(0, 32);
        dto.setVerified_reason(reason);

        dto.setWeihao(u.getWeihao());
        dto.setLang(u.getLang());
        dto.setVerifiedType(u.getverifiedType());
        return dto;
    }

    final public static String KEY_TWEET = "TWEET";
    final public static String KEY_TWEET_SOURCE = "TWEET_SOURCE";
    final public static String KEY_RETWEET = "RETWEET";
    final public static String KEY_RETWEET_SOURCE = "RETWEET_SOURCE";

    public static Map<String, Object> tweet(Status s) {
        Map<String, Object> map = new HashMap<String, Object>();
        User user = s.getUser();
        if (user != null) {
            TweetDTO dto = new TweetDTO();
            dto.setTid(Long.parseLong(s.getId()));
            dto.setMid(Long.parseLong(s.getMid()));
            dto.setUid(Long.parseLong(user.getId()));
            dto.setCreated_at(s.getCreatedAt());
            dto.setText(s.getText());
            dto.setReposts_count(s.getRepostsCount());
            dto.setComments_count(s.getCommentsCount());
            dto.setThumbnailPic(s.getThumbnailPic());
            dto.setBmiddlePic(s.getBmiddlePic());
            dto.setOriginalPic(s.getOriginalPic());
            TweetSourceDTO ts = tweetSource(s.getSource());
            dto.setSource_name(ts.getName());

            Status res = s.getRetweetedStatus();
            if (res != null) {
                User reuser = res.getUser();
                if (reuser != null) {
                    TweetDTO redto = new TweetDTO();
                    redto.setTid(Long.parseLong(res.getId()));
                    redto.setMid(Long.parseLong(res.getMid()));
                    redto.setUid(Long.parseLong(reuser.getId()));
                    redto.setCreated_at(res.getCreatedAt());
                    redto.setText(res.getText());
                    redto.setReposts_count(res.getRepostsCount());
                    redto.setComments_count(res.getCommentsCount());
                    redto.setThumbnailPic(res.getThumbnailPic());
                    redto.setBmiddlePic(res.getBmiddlePic());
                    redto.setOriginalPic(res.getOriginalPic());

                    TweetSourceDTO rets = tweetSource(res.getSource());
                    redto.setSource_name(rets.getName());
                    map.put(KEY_RETWEET_SOURCE, rets);
                    map.put(KEY_RETWEET, redto);
                    dto.setRetid(redto.getTid());
                }
            }

            map.put(KEY_TWEET_SOURCE, ts);
            map.put(KEY_TWEET, dto);
        }
        return map;
    }

    public static TweetSourceDTO tweetSource(Source source) {
        TweetSourceDTO dto = new TweetSourceDTO();
        dto.setUrl(source.getUrl());
        dto.setRelation_ship(source.getRelationship());
        dto.setName(source.getName());
        return dto;
    }
}

//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service;

import java.util.List;
import java.util.Map;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;
import org.conan.base.service.SpringService;

import org.conan.search.weibo.model.TweetDTO;

/**
 * This is Tweet DAO interface
 * @author Conan Zhang
 * @date 2012-11-10
 */
public interface TweetService extends SpringService {

    int insertTweet(TweetDTO dto);
    int updateTweet(TweetDTO dto);
    int saveTweet(TweetDTO dto);
    int saveTweet(TweetDTO dto, Map<String,Object> paramMap);
    int deleteTweet(int id);
    int deleteTweet(TweetDTO dto);
    

    TweetDTO getTweetById(int id);
    TweetDTO getTweetOne(Map<String,Object> paramMap);
    List<TweetDTO> getTweets(Map<String,Object> paramMap);
    PageOutObject<TweetDTO> getTweetsPaging(Map<String,Object> paramMap, PageInObject page);
    int getTweetsCount(Map<String,Object> paramMap);
}


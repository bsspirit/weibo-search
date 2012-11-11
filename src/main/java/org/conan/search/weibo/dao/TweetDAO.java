//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.TweetDTO;

/**
 * This is Tweet DAO interface
 * @author Conan Zhang
 * @date 2012-11-10
 */
public interface TweetDAO extends MybatisDAO {

    int insertTweet(TweetDTO dto);
    int updateTweet(TweetDTO dto);
    int deleteTweet(int id);
    int deleteTweets (TweetDTO dto);

    TweetDTO getTweetById(int id);
    TweetDTO getTweetOne(Map<String,Object> paramMap);
    List<TweetDTO> getTweets(Map<String,Object> paramMap);
    int getTweetsCount(Map<String,Object> paramMap);
}


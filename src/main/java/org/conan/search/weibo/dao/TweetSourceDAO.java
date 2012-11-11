//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.TweetSourceDTO;

/**
 * This is TweetSource DAO interface
 * @author Conan Zhang
 * @date 2012-11-10
 */
public interface TweetSourceDAO extends MybatisDAO {

    int insertTweetSource(TweetSourceDTO dto);
    int updateTweetSource(TweetSourceDTO dto);
    int deleteTweetSource(int id);
    int deleteTweetSources (TweetSourceDTO dto);

    TweetSourceDTO getTweetSourceById(int id);
    TweetSourceDTO getTweetSourceOne(Map<String,Object> paramMap);
    List<TweetSourceDTO> getTweetSources(Map<String,Object> paramMap);
    int getTweetSourcesCount(Map<String,Object> paramMap);
}


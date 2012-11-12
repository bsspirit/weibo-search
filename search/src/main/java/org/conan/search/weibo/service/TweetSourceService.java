//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service;

import java.util.List;
import java.util.Map;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;
import org.conan.base.service.SpringService;

import org.conan.search.weibo.model.TweetSourceDTO;

/**
 * This is TweetSource DAO interface
 * @author Conan Zhang
 * @date 2012-11-10
 */
public interface TweetSourceService extends SpringService {

    int insertTweetSource(TweetSourceDTO dto);
    int updateTweetSource(TweetSourceDTO dto);
    int saveTweetSource(TweetSourceDTO dto);
    int saveTweetSource(TweetSourceDTO dto, Map<String,Object> paramMap);
    int deleteTweetSource(int id);
    int deleteTweetSource(TweetSourceDTO dto);
    

    TweetSourceDTO getTweetSourceById(int id);
    TweetSourceDTO getTweetSourceOne(Map<String,Object> paramMap);
    List<TweetSourceDTO> getTweetSources(Map<String,Object> paramMap);
    PageOutObject<TweetSourceDTO> getTweetSourcesPaging(Map<String,Object> paramMap, PageInObject page);
    int getTweetSourcesCount(Map<String,Object> paramMap);
}


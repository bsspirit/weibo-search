//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service.impl;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import org.conan.base.service.SpringServiceImpl;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;

import org.conan.search.weibo.dao.TweetSourceDAO;
import org.conan.search.weibo.service.TweetSourceService;
import org.conan.search.weibo.model.TweetSourceDTO;

/**
 * This is TweetSource Service implemention
 * @author Conan Zhang
 * @date 2012-11-10
 */
@Service(value="tweetSourceService")
public class TweetSourceServiceImpl extends SpringServiceImpl implements TweetSourceService {

    @Autowired
    TweetSourceDAO tweetSourceDAO;

    public int insertTweetSource(TweetSourceDTO dto) {
        return tweetSourceDAO.insertTweetSource(dto);
    }
    
    public int updateTweetSource(TweetSourceDTO dto) {
        return tweetSourceDAO.updateTweetSource(dto);
    }
    
    public int saveTweetSource(TweetSourceDTO dto) {
        if (dto.getId() > 0) {
            return updateTweetSource(dto);
        }
        return insertTweetSource(dto);
    }

    public int saveTweetSource(TweetSourceDTO dto, Map<String, Object> paramMap) {
        TweetSourceDTO obj = getTweetSourceOne(paramMap);
        if (obj != null) {
            dto.setId(obj.getId());
            return updateTweetSource(dto);
        }
         return insertTweetSource(dto);
    }

    public int deleteTweetSource(int id) {
        return tweetSourceDAO.deleteTweetSource(id);
    }

	public int deleteTweetSource(TweetSourceDTO dto) {
        return tweetSourceDAO.deleteTweetSources(dto);
    }

    public TweetSourceDTO getTweetSourceById(int id) {
        return tweetSourceDAO.getTweetSourceById(id);
    }
    
    public TweetSourceDTO getTweetSourceOne(Map<String, Object> paramMap) {
        return tweetSourceDAO.getTweetSourceOne(paramMap);
    }

    public List<TweetSourceDTO> getTweetSources(Map<String, Object> paramMap) {
        return tweetSourceDAO.getTweetSources(paramMap);
    }

    public PageOutObject<TweetSourceDTO> getTweetSourcesPaging(Map<String, Object> paramMap, PageInObject page) {
        paramMap.put("page", page);
        List<TweetSourceDTO> list = tweetSourceDAO.getTweetSources(paramMap);
        int count = tweetSourceDAO.getTweetSourcesCount(paramMap);
        return new PageOutObject<TweetSourceDTO>(count, list, page);
    }
    
    public int getTweetSourcesCount(Map<String, Object> paramMap) {
        return tweetSourceDAO.getTweetSourcesCount(paramMap);
    }

}

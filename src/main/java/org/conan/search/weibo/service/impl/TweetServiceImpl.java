//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service.impl;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import org.conan.base.service.SpringServiceImpl;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;

import org.conan.search.weibo.dao.TweetDAO;
import org.conan.search.weibo.service.TweetService;
import org.conan.search.weibo.model.TweetDTO;

/**
 * This is Tweet Service implemention
 * @author Conan Zhang
 * @date 2012-11-10
 */
@Service(value="tweetService")
public class TweetServiceImpl extends SpringServiceImpl implements TweetService {

    @Autowired
    TweetDAO tweetDAO;

    public int insertTweet(TweetDTO dto) {
        return tweetDAO.insertTweet(dto);
    }
    
    public int updateTweet(TweetDTO dto) {
        return tweetDAO.updateTweet(dto);
    }
    
    public int saveTweet(TweetDTO dto) {
        if (dto.getId() > 0) {
            return updateTweet(dto);
        }
        return insertTweet(dto);
    }

    public int saveTweet(TweetDTO dto, Map<String, Object> paramMap) {
        TweetDTO obj = getTweetOne(paramMap);
        if (obj != null) {
            dto.setId(obj.getId());
            return updateTweet(dto);
        }
         return insertTweet(dto);
    }

    public int deleteTweet(int id) {
        return tweetDAO.deleteTweet(id);
    }

	public int deleteTweet(TweetDTO dto) {
        return tweetDAO.deleteTweets(dto);
    }

    public TweetDTO getTweetById(int id) {
        return tweetDAO.getTweetById(id);
    }
    
    public TweetDTO getTweetOne(Map<String, Object> paramMap) {
        return tweetDAO.getTweetOne(paramMap);
    }

    public List<TweetDTO> getTweets(Map<String, Object> paramMap) {
        return tweetDAO.getTweets(paramMap);
    }

    public PageOutObject<TweetDTO> getTweetsPaging(Map<String, Object> paramMap, PageInObject page) {
        paramMap.put("page", page);
        List<TweetDTO> list = tweetDAO.getTweets(paramMap);
        int count = tweetDAO.getTweetsCount(paramMap);
        return new PageOutObject<TweetDTO>(count, list, page);
    }
    
    public int getTweetsCount(Map<String, Object> paramMap) {
        return tweetDAO.getTweetsCount(paramMap);
    }

}

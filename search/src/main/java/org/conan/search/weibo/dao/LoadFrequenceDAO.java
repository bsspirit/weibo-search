//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.LoadFrequenceDTO;

/**
 * This is LoadFrequence DAO interface
 * @author Conan Zhang
 * @date 2012-11-07
 */
public interface LoadFrequenceDAO extends MybatisDAO {

    int insertLoadFrequence(LoadFrequenceDTO dto);
    int updateLoadFrequence(LoadFrequenceDTO dto);
    int deleteLoadFrequence(int id);
    int deleteLoadFrequences (LoadFrequenceDTO dto);

    LoadFrequenceDTO getLoadFrequenceById(int id);
    LoadFrequenceDTO getLoadFrequenceOne(Map<String,Object> paramMap);
    List<LoadFrequenceDTO> getLoadFrequences(Map<String,Object> paramMap);
    int getLoadFrequencesCount(Map<String,Object> paramMap);
}


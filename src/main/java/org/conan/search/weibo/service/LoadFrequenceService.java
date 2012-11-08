//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service;

import java.util.List;
import java.util.Map;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;
import org.conan.base.service.SpringService;

import org.conan.search.weibo.model.LoadFrequenceDTO;

/**
 * This is LoadFrequence DAO interface
 * @author Conan Zhang
 * @date 2012-11-07
 */
public interface LoadFrequenceService extends SpringService {

    int insertLoadFrequence(LoadFrequenceDTO dto);
    int updateLoadFrequence(LoadFrequenceDTO dto);
    int saveLoadFrequence(LoadFrequenceDTO dto);
    int saveLoadFrequence(LoadFrequenceDTO dto, Map<String,Object> paramMap);
    int deleteLoadFrequence(int id);
    int deleteLoadFrequence(LoadFrequenceDTO dto);
    

    LoadFrequenceDTO getLoadFrequenceById(int id);
    LoadFrequenceDTO getLoadFrequenceOne(Map<String,Object> paramMap);
    List<LoadFrequenceDTO> getLoadFrequences(Map<String,Object> paramMap);
    PageOutObject<LoadFrequenceDTO> getLoadFrequencesPaging(Map<String,Object> paramMap, PageInObject page);
    int getLoadFrequencesCount(Map<String,Object> paramMap);
}


//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service.impl;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import org.conan.base.service.SpringServiceImpl;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;

import org.conan.search.weibo.dao.LoadFrequenceDAO;
import org.conan.search.weibo.service.LoadFrequenceService;
import org.conan.search.weibo.model.LoadFrequenceDTO;

/**
 * This is LoadFrequence Service implemention
 * @author Conan Zhang
 * @date 2012-11-07
 */
@Service(value="loadFrequenceService")
public class LoadFrequenceServiceImpl extends SpringServiceImpl implements LoadFrequenceService {

    @Autowired
    LoadFrequenceDAO loadFrequenceDAO;

    public int insertLoadFrequence(LoadFrequenceDTO dto) {
        return loadFrequenceDAO.insertLoadFrequence(dto);
    }
    
    public int updateLoadFrequence(LoadFrequenceDTO dto) {
        return loadFrequenceDAO.updateLoadFrequence(dto);
    }
    
    public int saveLoadFrequence(LoadFrequenceDTO dto) {
        if (dto.getId() > 0) {
            return updateLoadFrequence(dto);
        }
        return insertLoadFrequence(dto);
    }

    public int saveLoadFrequence(LoadFrequenceDTO dto, Map<String, Object> paramMap) {
        LoadFrequenceDTO obj = getLoadFrequenceOne(paramMap);
        if (obj != null) {
            dto.setId(obj.getId());
            return updateLoadFrequence(dto);
        }
         return insertLoadFrequence(dto);
    }

    public int deleteLoadFrequence(int id) {
        return loadFrequenceDAO.deleteLoadFrequence(id);
    }

	public int deleteLoadFrequence(LoadFrequenceDTO dto) {
        return loadFrequenceDAO.deleteLoadFrequences(dto);
    }

    public LoadFrequenceDTO getLoadFrequenceById(int id) {
        return loadFrequenceDAO.getLoadFrequenceById(id);
    }
    
    public LoadFrequenceDTO getLoadFrequenceOne(Map<String, Object> paramMap) {
        return loadFrequenceDAO.getLoadFrequenceOne(paramMap);
    }

    public List<LoadFrequenceDTO> getLoadFrequences(Map<String, Object> paramMap) {
        return loadFrequenceDAO.getLoadFrequences(paramMap);
    }

    public PageOutObject<LoadFrequenceDTO> getLoadFrequencesPaging(Map<String, Object> paramMap, PageInObject page) {
        paramMap.put("page", page);
        List<LoadFrequenceDTO> list = loadFrequenceDAO.getLoadFrequences(paramMap);
        int count = loadFrequenceDAO.getLoadFrequencesCount(paramMap);
        return new PageOutObject<LoadFrequenceDTO>(count, list, page);
    }
    
    public int getLoadFrequencesCount(Map<String, Object> paramMap) {
        return loadFrequenceDAO.getLoadFrequencesCount(paramMap);
    }

}

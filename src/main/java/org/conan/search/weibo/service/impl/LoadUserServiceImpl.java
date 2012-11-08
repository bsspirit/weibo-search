//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service.impl;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import org.conan.base.service.SpringServiceImpl;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;

import org.conan.search.weibo.dao.LoadUserDAO;
import org.conan.search.weibo.service.LoadUserService;
import org.conan.search.weibo.model.LoadUserDTO;

/**
 * This is LoadUser Service implemention
 * @author Conan Zhang
 * @date 2012-11-08
 */
@Service(value="loadUserService")
public class LoadUserServiceImpl extends SpringServiceImpl implements LoadUserService {

    @Autowired
    LoadUserDAO loadUserDAO;

    public int insertLoadUser(LoadUserDTO dto) {
        return loadUserDAO.insertLoadUser(dto);
    }
    
    public int updateLoadUser(LoadUserDTO dto) {
        return loadUserDAO.updateLoadUser(dto);
    }
    
    public int saveLoadUser(LoadUserDTO dto) {
        if (dto.getId() > 0) {
            return updateLoadUser(dto);
        }
        return insertLoadUser(dto);
    }

    public int saveLoadUser(LoadUserDTO dto, Map<String, Object> paramMap) {
        LoadUserDTO obj = getLoadUserOne(paramMap);
        if (obj != null) {
            dto.setId(obj.getId());
            return updateLoadUser(dto);
        }
         return insertLoadUser(dto);
    }

    public int deleteLoadUser(int id) {
        return loadUserDAO.deleteLoadUser(id);
    }

	public int deleteLoadUser(LoadUserDTO dto) {
        return loadUserDAO.deleteLoadUsers(dto);
    }

    public LoadUserDTO getLoadUserById(int id) {
        return loadUserDAO.getLoadUserById(id);
    }
    
    public LoadUserDTO getLoadUserOne(Map<String, Object> paramMap) {
        return loadUserDAO.getLoadUserOne(paramMap);
    }

    public List<LoadUserDTO> getLoadUsers(Map<String, Object> paramMap) {
        return loadUserDAO.getLoadUsers(paramMap);
    }

    public PageOutObject<LoadUserDTO> getLoadUsersPaging(Map<String, Object> paramMap, PageInObject page) {
        paramMap.put("page", page);
        List<LoadUserDTO> list = loadUserDAO.getLoadUsers(paramMap);
        int count = loadUserDAO.getLoadUsersCount(paramMap);
        return new PageOutObject<LoadUserDTO>(count, list, page);
    }
    
    public int getLoadUsersCount(Map<String, Object> paramMap) {
        return loadUserDAO.getLoadUsersCount(paramMap);
    }

}

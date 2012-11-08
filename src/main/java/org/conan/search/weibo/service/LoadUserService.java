//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service;

import java.util.List;
import java.util.Map;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;
import org.conan.base.service.SpringService;

import org.conan.search.weibo.model.LoadUserDTO;

/**
 * This is LoadUser DAO interface
 * @author Conan Zhang
 * @date 2012-11-08
 */
public interface LoadUserService extends SpringService {

    int insertLoadUser(LoadUserDTO dto);
    int updateLoadUser(LoadUserDTO dto);
    int saveLoadUser(LoadUserDTO dto);
    int saveLoadUser(LoadUserDTO dto, Map<String,Object> paramMap);
    int deleteLoadUser(int id);
    int deleteLoadUser(LoadUserDTO dto);
    

    LoadUserDTO getLoadUserById(int id);
    LoadUserDTO getLoadUserOne(Map<String,Object> paramMap);
    List<LoadUserDTO> getLoadUsers(Map<String,Object> paramMap);
    PageOutObject<LoadUserDTO> getLoadUsersPaging(Map<String,Object> paramMap, PageInObject page);
    int getLoadUsersCount(Map<String,Object> paramMap);
}

